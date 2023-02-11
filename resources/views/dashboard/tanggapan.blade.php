@extends('layouts.dashboard')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Laporan </h1>
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
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <form action="/insertTanggapan" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="users_id" value="{{ $dataUser->id }}" id="">
                                <input type="hidden" name="reports_id" value="{{ $data->id }}" id="">
                                <div class="form-group">
                                    <label for="inputName">Nama Pelapor : {{ $data->users->name }}</label>
                                </div>
                                <div class="form-group">
                                    <label for="inputName">Judul Laporan : {!! $data->title !!}</label>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Tanggapi Laporan</label>
                                    <textarea id="summernote" name="body" class="form-control" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
