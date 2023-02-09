<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = People::all();
        return view('dashboard.masyarakat', [
            'title' => 'SIADU &mdash; Masyarakat',
            'data' => $data
        ]);
    }
    public function buatAkun()
    {
        return view('dashboard.addMasyarakat', [
            'title' => 'SIADU &mdash; Buat Akun'
        ]);
    }
    public function insertMasyarakat(Request $request)
    {
        if ($data = People::create()) {
            return
                redirect('/dashboard/masyarakat')->with('sukses', 'Berhasil Membuat Akun!');
        } else {
            return
                redirect('/dashboard/masyarakat')->with('gagal', 'Gagal Membuat Akun!');
        }
    }
}
