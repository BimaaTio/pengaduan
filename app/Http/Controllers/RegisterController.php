<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('register', 
    [
        "title" => 'SIADU &mdash; Register'
    ]
    );
    }
    public function prosesRegister(Request $request)
    {
        $validateData = $request->validate([
            'name' => ' required|max:255',
            'username' => ['required','min:3','max:255','unique:users'],
            'telp' => 'required|max:20',
            'nik' => 'required|max:20',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:3|max:255'
            ]);
        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);
        return redirect('/login')->with('sukses', 'Berhasil Membuat Akun!');
    }
    public function masyarakat(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'nik' => 'required|max:20',
            'telp' => 'required|max:20',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:3|max:255'
        ]);
        $data['password'] = Hash::make($data['password']);
        People::Create($data);
        return redirect('/dashboard/masyarakat')->with('sukses', 'Berhasil Membuat Akun!');
    }
}
