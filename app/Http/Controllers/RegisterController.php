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
        return view(
            'register',
            [
                "title" => 'SIADU &mdash; Register'
            ]
        );
    }
    public function prosesRegister(Request $request)
    {
        $validateData = $request->validate([
            'name' => ' required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'telp' => 'required|max:20',
            'role' => 'required',
            'nik' => 'required|max:20',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:3|max:255'
        ]);
        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);
        return redirect()->route('login')->with('sukses', 'Berhasil Membuat Akun!');
    }
    public function masyarakat(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'nik' => 'required|max:20',
            'role' => 'required',
            'telp' => 'required|max:20',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:3|max:255'
        ]);
        $data['password'] = Hash::make($data['password']);
        User::Create($data);
        return redirect()->route('masyarakat')->with('sukses', 'Berhasil Membuat Akun!');
    }
    public function petugas(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'nik' => 'required|max:20',
            'role' => 'required',
            'telp' => 'required|max:20',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:3|max:255'
        ]);
        $data['password'] = Hash::make($data['password']);
        User::Create($data);
        return redirect()->route('petugas')->with('sukses', 'Berhasil Membuat Akun!');
    }
}
