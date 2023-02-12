@extends('layouts.main')
@include('partials.home.navbar')
@section('konten')
<h1 class="text-center my-3">{{ $data->reports->title }}</h1>
<hr class="my-3">
<div class="container">
    <div class="row">
        <div class="col-8 ">
            <img src="{{ asset('img/laporan/'.$data->reports->foto) }}" alt="" class="card-img-top rounded mb-3">
            <ul class="list-unstyled ms-2">
                <li>
                  Isi Laporan : <p>{!! $data->reports->body !!}</p>
                </li>
                <br>
                <li>
                  Tanggapan : <p>{!! $data->body !!}</p>
                </li>
                <br>
                <li>
                  Yang Menanggapi : {{ $data->users->username }}
                </li>
                <br>
                <li>
                  <small class="text-muted">{{ $data->created_at->format('d M Y') }}</small>
                </li>
            </ul>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <p class="text-center"><u>Laporan Lainya</u></p>
                    <br>
                    <ul class="ms-3">
                      @foreach($lain as $l)
                      <li><a href="/daftar-laporan/show/{{ $l->id }}">{{ $l->reports->title }}</a></li>
                      @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection