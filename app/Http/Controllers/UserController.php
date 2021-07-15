<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

//use App\Http\Controllers\Auth;

class UserController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function profile()
    {
        return view('user.profile');
    }

    public function destroy()
    {
        $user = User::find(Auth::user()->id);

        Auth::logout();

        if ($user->delete()) {

            return redirect('/home');
        }
    }

    public function update(Request $request) {
        $data = $request->all();
        User::findOrFail($request->id)->update($data);
        return view('user.profile');

    }

    public function edit(){
        $user = User::find(Auth::user()->id);
        return view('user.edit');
    }


}
