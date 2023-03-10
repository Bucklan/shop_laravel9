<?php

namespace App\Http\Controllers\Auth2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function logout(){
        Auth::logout();
        return redirect()->route('shops.index');
    }
    public function create(){
        return view('auth.login');
    }
    public function login(Request $request){
        if(Auth::check()){
            return redirect()->intended('/shops');
        }
        $validated=$request->validate([
            'email'=>'required|email',
            'password'=>'required|string'
        ]);
        if(Auth::attempt($validated)){
            if(Auth::user()->role->name=="admin")
                return redirect()->intended('/adm/users');
            return redirect()->intended('shops.index');
        }
        return back()->withErrors(__('alerts.Incorrect email or password'));
    }
}
