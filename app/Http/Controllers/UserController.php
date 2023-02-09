<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Method get page by role
    public function masyarakat()
    {
        $dataMasyarakat = User::all()->where('role', 'm');
        return view('dashboard.masyarakat', [
            'title' => 'SIADU &mdash; Masyarakat',
            'dataMasyarakat' => $dataMasyarakat
        ]);
    }
    public function petugas()
    {
        $dataPetugas = User::all()->where('role', 'p');
        return view('dashboard.petugas', [
            'title' => 'SIADU &mdash; Petugas',
            'dataPetugas' => $dataPetugas
        ]);
    }

    // Method buat Akun
    public function buatAkunMasyarakat()
    {
        return view('dashboard.addMasyarakat', [
            'title' => 'SIADU &mdash; Buat Akun'
        ]);
    }
}
