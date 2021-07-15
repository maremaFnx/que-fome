<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class HomeController extends Controller
{
    //


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

}
