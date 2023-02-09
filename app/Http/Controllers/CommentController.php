<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Report $id)
    {
        $data = $id;
        return view('dashboard.tanggapan', [
            'title' => 'SIADU &mdash; Tanggapan',
            'data' => $data
        ]);
    }
    public function tanggapi(Request $request)
    {
        $data = Report::find($request->reports_id);
        if (Comment::create($request->all())) {
            return redirect('/dashboard/report')->with('sukses', 'Berhasil Menaggapi Laporan!');
            $data->status = 'acc';
            $data->save();
        } else {
            return redirect('/dashboard/report')->with('gagal', 'Gagal Menanggapi Laporan!');
        }
    }
}
