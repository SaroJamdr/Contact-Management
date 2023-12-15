<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register_page(){
        return view('Auth.register');
    }

    public function register(Request $request){
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'unique|required|email|max:255',
            'password' => 'required|string|confirmed|min:6|max:255',
            // 'conf_password' => 'required|string|max:255'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        return redirect()->route('login');
    }

    public function login_page(){
        return view('Auth.login');
    }

    public function login(Request $request){
        // dd($request);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended('contact')->with('success','Logged in succesfully');;
        }
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('home');
    }
}
