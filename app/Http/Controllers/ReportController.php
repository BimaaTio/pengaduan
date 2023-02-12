<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Comment;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = Comment::with('users','reports')->paginate(6);
        return view('aduan.index',[
            'title' => 'Daftar Laporan',
            'data' => $data
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $id)
    {   
        $data = $id;
        $dataAll = Comment::with('users','reports')->get();
        return view('aduan.single',[
            'title' => 'Single',
            'data' => $data,
            'lain' => $dataAll
    ]);
    }
}
