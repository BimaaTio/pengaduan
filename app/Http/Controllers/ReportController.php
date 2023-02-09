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
        if ($data = Report::create($request->all())) {
            if ($request->hasFile('foto')) {
                $request->file('foto')->move('img/laporan', $request->file('foto')->getClientOriginalName());
                $data->foto = $request->file('foto')->getClientOriginalName();
                $data->save();
            }
            return redirect('/dashboard/report')->with('sukses', 'Berhasil Membuat Laporan!');
        } else {
            return redirect('/dashboard/report')->with('gagal', 'Gagal Membuat Laporan!');
        }
    }
    public function hapusLaporan(Report $id)
    {
        $data = $id;
        if ($data->delete()) {
            return redirect('/dashboard/report')->with('sukses', 'Berhasil Menghapus Laporan!');
        } else {
            return redirect('/dashboard/report')->with('gagal', 'Berhasil Menghapus Laporan!');
        }
    }
}
