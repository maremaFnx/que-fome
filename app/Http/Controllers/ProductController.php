<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

use function Ramsey\Uuid\v1;

class ProductController extends Controller
    {
        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            $this->middleware('auth');
        }

        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
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

    public function destroy($id){
        Product::findOrFail($id)->delete();
        return redirect('/home');

    }
    public function edit($id){
        $products = Product::findOrFail($id);
        return view('products.edit', ['products' => $products]);

    }

    public function buy($id){
        $user = auth()->user();
        $user->productAsCustomer()->attach($id);
        return redirect('/home');
    }

    public function giveback($id){
        $user = auth()->user();
        $user->productAsCustomer()->detach($id);
        $product = Product::findOrFail($id);
        return redirect('/cart');
    }

    public function update(Request $request) {

        $data = $request->all();

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

            $requestImage->move(public_path('img/products'), $imageName);

            $data['image'] = $imageName;

        }

        Product::findOrFail($request->id)->update($data);

        return redirect('/home');

    }
    public function profile(){
        return view('user.profile');
    }

    public function cart(){
        $user = auth()->user();
        $productAsCustomer = $user->productAsCustomer;
        return view('user.cart', ['productAsCustomer'=>$productAsCustomer]);
    }

}
