<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $search = request('search');

        if ($search) {
            $products = Product::where([
                ['name', 'like', '%'.$search.'%']
            ])->get();
        } else {
            $products = Product::all();
        }
        return view('home', ['products' => $products, 'search' => $search]);
    }

    public function create()
    {
        return view('products.create');
    }
    public function show($id)
    {
        $products = Product::findOrFail($id);
        return view('products.show', ['products' => $products]);
    }

    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->minutes = $request->price;
        $product->avaliable = $request->avaliable;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $requestImage->move(public_path('img/products'), $imageName);
            $product->image = $imageName;
        }
        $product->save();
        return redirect('/products/create');
    }
}
