@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan</h1>
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
                            <h3 class="card-title">Data Laporan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="report" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr>
                                        <th width="1%">No</th>
                                        <th>NIK Pengadu</th>
                                        <th>Nama Pengadu</th>
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
                                        $no = 1;
                                    @endphp
                                    @forelse ($dataLap as $d)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ ucwords($d->users->nik) }}</td>
                                            <td>{{ ucwords($d->users->username) }}</td>
                                            <td>{{ $d->title }}</td>
                                            <td>{!! $d->body !!}</td>
                                            <td>{{ $d->created_at->format('d M Y') }}</td>
                                            <td>
                                                <img width="150" src="{{ asset('img/laporan/' . $d->foto) }}"
                                                    alt="" class="img-fluid img-thumbnail">
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
                                                    <a href="/dashboard/report/tanggapi/{{ $d->id }}"
                                                        title="Beri Tanggapan" class="btn btn-sm btn-info">
                                                        <i class="fas fa-comment"></i>
                                                    </a>
                                                    <a onclick="return confirm('Yakin Di Hapus?')"href="/dashboard/report/hapus/{{ $d->id }}"
                                                        class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                @endif
                                                @if ($d->status == 'acc')
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="9">Data Tidak ada!</td>
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
                                    @php
                                        $i = 1;
                                    @endphp
                                    @forelse ($dataComment as $dc)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $dc->users->name }}</td>
                                            <td>{!! $dc->reports->title !!}</td>
                                            <td>{!! $dc->reports->body !!}</td>
                                            <td>{!! $dc->body !!}</td>
                                            <td>{{ $dc->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a onclick="return confirm('Yakin Di Hapus?')"
                                                    href="/dashboard/tanggapan/hapus/{{ $dc->id }}"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <td colspan="9">Tidak Ada Data!</td>
                                    @endforelse
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
