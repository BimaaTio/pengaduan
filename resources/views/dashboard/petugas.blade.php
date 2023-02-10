@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kelola Akun Petugas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active">Petugas</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    @if ($msg = Session::get('sukses'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Sip!</strong> {{ $msg }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3>Data Akun Petugas</h3>
                            <a href="/dashboard/buat-akun-petugas" class="my-2 btn btn-sm btn-primary">Tambah Akun
                                Petugas</a>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <table id="example3" class="table table-bordered table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th width="1%">#</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Tgl Buat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @php
                                            $p = 1;
                                        @endphp
                                        @forelse($dataPetugas as $dp)
                                            <tr>
                                                <td>{{ $p++ }}</td>
                                                <td>{{ $dp->nik }}</td>
                                                <td>{{ $dp->name }}</td>
                                                <td>{{ $dp->username }}</td>
                                                <td>{{ $dp->email }}</td>
                                                <td>{{ $dp->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <a href="/dashboard/petugas/hapus/{{ $dp->nik }}"
                                                        class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                        @empty
                                            <td colspan="9">DATA TIDAK ADA</td>
                                        @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
