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
    
}
