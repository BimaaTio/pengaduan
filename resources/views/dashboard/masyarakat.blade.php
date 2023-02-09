@extends('layouts.dashboard')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kelola Akun Masyarakat</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Masyarakat</li>
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
                <div class="card">
                    <div class="card-header">
                        <h3>Data Akun Masyarakat</h3>
                        <a href="/dashboard/buat-akun-masyarakat" class="my-2 btn btn-sm btn-primary">Tambah Akun
                            Masyarakat</a>
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
                                    $no = 1;
                                    @endphp
                                    @forelse($dataMasyarakat as $dm)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $dm->nik }}</td>
                                        <td>{{ $dm->name }}</td>
                                        <td>{{ $dm->username }}</td>
                                        <td>{{ $dm->email }}</td>
                                        <td>{{ $dm->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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