<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Method menampilkan semua page sesuai parameter
    public function index()
    {
        // Data user yang sedang login
        $data = Auth::user();
        $dataUser = User::all();
        $dataLap = collect(Report::with('users')->get());
        $dataComment = collect(Comment::with('reports')->get());
        return view('dashboard.index', [
            'title' => 'SIADU &mdash; Dashboard',
            'dataUser' => $data,
            'data' => $dataUser,
            'dataLap' => $dataLap,
            'dataComment' => $dataComment
        ]);
    }

    public function indexReport()
    {
        $dataLap = collect(Report::with('users')->get());
        $dataUser = Auth::user();
        $dataComment = collect(Comment::with(['reports', 'users'])->get());
        return view('dashboard.reports', [
            'title' => 'SIADU &mdash; Laporan',
            'dataLap' => $dataLap,
            'dataUser' => $dataUser,
            'dataComment' => $dataComment

        ]);
    }
    public function tambahLaporan()
    {
        $data = Auth::user();
        return view('dashboard.addReport', [
            'title' => 'SIADU &mdash; Buat Laporan',
            'dataUser' => $data
        ]);
    }
    public function indexComment(Report $id)
    {
        $data = $id;
        $dataUser = Auth::user();
        return view('dashboard.tanggapan', [
            'title' => 'SIADU &mdash; Tanggapan',
            'data' => $data,
            'dataUser' => $dataUser
        ]);
    }
    public function masyarakat()
    {
        $dataUser = Auth::user();
        $dataMasyarakat = User::get()->where('role', 'm');
        return view('dashboard.masyarakat', [
            'title' => 'SIADU &mdash; Masyarakat',
            'dataMasyarakat' => $dataMasyarakat,
            'dataUser' => $dataUser
        ]);
    }
    public function petugas()
    {
        $dataPetugas = User::get()->where('role', 'p');
        $dataUser = Auth::user();
        return view('dashboard.petugas', [
            'title' => 'SIADU &mdash; Petugas',
            'dataPetugas' => $dataPetugas,
            'dataUser' => $dataUser
        ]);
    }
    public function admin()
    {
        $dataAdmin = User::get()->where('role', 'a');
        $dataUser = Auth::user();
        return view('dashboard.admin', [
            'title' => 'SIADU &mdash; Admin',
            'dataAdmin' => $dataAdmin,
            'dataUser' => $dataUser
        ]);
    }
    public function buatAkunAdmin()
    {
        $dataUser = Auth::user();
        return view('dashboard.addPetugas', [
            'title' => 'SIADU &mdash; Buat Akun',
            'dataUser' => $dataUser
        ]);
    }
    public function buatAkunMasyarakat()
    {
        $dataUser = Auth::user();
        return view('dashboard.addMasyarakat', [
            'title' => 'SIADU &mdash; Buat Akun',
            'dataUser' => $dataUser
        ]);
    }
    public function buatAkunPetugas()
    {
        $dataUser = Auth::user();
        return view('dashboard.addPetugas', [
            'title' => 'SIADU &mdash; Buat Akun',
            'dataUser' => $dataUser
        ]);
    }
    // Method create
    public function insertReport(Request $request)
    {
        if ($data = Report::create($request->all())) {
            if ($request->hasFile('foto')) {
                $request->file('foto')->move('img/laporan', $request->file('foto')->getClientOriginalName());
                $data->foto = $request->file('foto')->getClientOriginalName();
                $data->save();
            }
            return redirect('/dashboard/buat-laporan')->with('sukses', 'Berhasil Membuat Laporan, Silakan Tunggu Sampai Laporan Ditanggapi! ');
        } else {
            return redirect('/dashboard/buar-laporan')->with('gagal', 'Gagal Membuat Laporan!');
        }
    }
    public function tanggapi(Request $request)
    {
        $data = Report::find($request->reports_id);
        if (Comment::create($request->all())) {
            $data->update(['status' => 'acc']);
            return redirect('/dashboard/report')->with('sukses', 'Berhasil Menaggapi Laporan!');
        } else {
            return redirect('/dashboard/report')->with('gagal', 'Gagal Menanggapi Laporan!');
        }
    }
    // Method Hapus
    public function hapusLaporan(Report $id)
    {
        $data = $id;
        if ($data->delete()) {
            return redirect('/dashboard/report')->with('sukses', 'Berhasil Menghapus Laporan!');
        } else {
            return redirect('/dashboard/report')->with('gagal', 'Gagal Menghapus Laporan!');
        }
    }
    public function hapusComment(Comment $id)
    {
        $data = $id;
        $dataReport = Report::find($data->reports_id);
        if ($data->delete()) {
            $dataReport->update(['status' => 'pending']);
            return redirect('/dashboard/report')->with('sukses', 'Berhasil Menghapus Tanggapan!');
        } else {
            return redirect('/dashboard/report')->with('gagal', 'Gagal Menghapus Tanggapan!');
        }
    }
    public function hapusMas(User $nik)
    {
        $data = $nik;
        if ($data->delete()) {
            return redirect('/dashboard/masyarakat')->with('sukses', 'Berhasil Menghapus Akun!');
        } else {
            dump($data);
        }
    }
    public function hapusPet(User $nik)
    {
        $data = $nik;
        if ($data->delete()) {
            return redirect('/dashboard/petugas')->with('sukses', 'Berhasil Menghapus Akun!');
        } else {
            dump($data);
        }
    }
    public function hapusAdm(User $nik)
    {
        $data = $nik;
        if ($data->delete()) {
            return redirect('/dashboard/admin')->with('sukses', 'Berhasil Menghapus Akun!');
        } else {
            dump($data);
        }
    }
}
