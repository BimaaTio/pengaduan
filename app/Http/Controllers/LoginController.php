<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login',
        [
            "title" => 'SIADU &mdash; Login'
        ]
    );
    }
    public function prosesLogin(Request $request)
    {
        $dataValidate = $request->validate(
            [
                'email' => 'required|email:dns',
                'password' => 'required'
            ]
        );
        
        if(Auth::attempt($dataValidate)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('loginError', 'Login Failed');
    }
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('login');
    }
}
