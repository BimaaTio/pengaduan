<?php

namespace App\Http\Controllers;

use App\Models\Report;
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
        $data = Report::all();
        return view('dashboard.reports', [
            'title' => 'SIADU &mdash; Laporan',
            'data' => $data
        ]);
    }

    public function tambahLaporan()
    {
        return view('dashboard.addReport', [
            'title' => 'SIADU &mdash; Buat Laporan'
        ]);
    }

    public function insertReport(Request $request)
    {
        dd($request);
        Report::create($request->all());
    }
}
