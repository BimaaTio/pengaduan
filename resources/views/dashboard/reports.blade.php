@extends('layouts.dashboard')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Laporan</h1>
                <a href="/dashboard/buat-laporan" class="btn btn-primary">Buat Laporan</a>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Laporan</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">
    <div class="containers">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Laporan</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th width="1%">No</th>
                                    <th width="10%">Nama Pengadu</th>
                                    <th width="20%">Judul Laporan</th>
                                    <th>Laporan</th>
                                    <th>Tgl</th>
                                    <th>Foto</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no =1;
                                @endphp
                                @forelse ($data as $d)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>Bima</td>
                                    <td>{{ $d->title }}</td>
                                    <td>{!! $d->body !!}</td>
                                    <td>{{ $d->created_at->format('d M Y') }}</td>
                                    <td>
                                        <img width="150" src="{{ asset('img/laporan/'.$d->foto) }}" alt=""
                                            class="img-fluid img-thumbnail">
                                    </td>
                                    <td>
                                        @if ($d->status == 'pending')
                                        <span class="badge badge-warning">Pending</span>
                                        @endif
                                        @if ($d->status == 'acc')
                                        <span class="badge badge-success">Accept</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($d->status == 'pending')
                                        <a href="/dashboard/report/hapus/{{ $d->id }}" class="btn btn-md btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                <td colspan="9"></td>
                                @endforelse

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Laporan Yang Sudah ditanggapi</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped text-center">
                            <thead>
                                <tr>
                                    <th width="1%">#</th>
                                    <th width="10%">Nama Petugas</th>
                                    <th width="20%">Judul Laporan</th>
                                    <th>Laporan</th>
                                    <th>Tanggapan</th>
                                    <th>Tgl Tanggapan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Bima</td>
                                    <td>Win 95+</td>
                                    <td> 4</td>
                                    <td>X</td>
                                    <td>X</td>
                                    <td>X</td>
                                </tr>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
@endsection