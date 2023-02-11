@extends('layouts.main')
@include('partials.home.navbar')
@section('konten')
<style>
    .wrapper {
        display: table;
        height: 100%;
        width: 100%;
    }

    .container-fostrap {
        display: table-cell;
        padding: 1em;
        text-align: center;
        vertical-align: middle;
    }

    .fostrap-logo {
        width: 100px;
        margin-bottom: 15px
    }

    h1.heading {
        color: #fff;
        font-size: 1.15em;
        font-weight: 900;
        margin: 0 0 0.5em;
        color: #505050;
    }

    @media (min-width: 450px) {
        h1.heading {
            font-size: 3.55em;
        }
    }

    @media (min-width: 760px) {
        h1.heading {
            font-size: 3.05em;
        }
    }

    @media (min-width: 900px) {
        h1.heading {
            font-size: 3.25em;
            margin: 0 0 0.3em;
        }
    }

    .card {
        display: block;
        margin-bottom: 20px;
        line-height: 1.42857143;
        background-color: #fff;
        border-radius: 2px;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
        transition: box-shadow .25s;
    }

    .card:hover {
        box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .img-card {
        width: 100%;
        height: 200px;
        border-top-left-radius: 2px;
        border-top-right-radius: 2px;
        display: block;
        overflow: hidden;
    }

    .img-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: all .25s ease;
    }

    .card-content {
        padding: 15px;
        text-align: left;
    }

    .card-title {
        margin-top: 0px;
        font-weight: 700;
        font-size: 1.65em;
    }

    .card-title a {
        color: #000;
        text-decoration: none !important;
    }

    .card-read-more {
        border-top: 1px solid #D4D4D4;
    }

    .card-read-more a {
        text-decoration: none !important;
        padding: 10px;
        font-weight: 600;
        text-transform: uppercase
    }
</style>
<h1 class="text-center my-3">Daftar Laporan yang sudah di tanggapi</h1>
<hr class="my-3">
<section class="wrapper">
    <div class="container-fostrap">
        <div class="content">
            <div class="container">
                <div class="row">
                    @forelse($data as $d)
                    <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <a class="img-card">
                                <img src="img/laporan/{{ $d->reports->foto }}" />
                            </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                    {{ $d->reports->title }}
                                </h4>
                                <p class="">
                                    <ul class="list-unstyled">
                                        <li>Ditanggapi oleh : {{ $d->users->username }}</li>
                                    </ul>
                                </p>
                                <small class="text-right text-muted">{{  $d->created_at->diffForHumans() }}</small>
                            </div>
                            <div class="card-read-more">
                                <a href="/report/show/{{ $d->id }}"
                                    class="btn btn-link btn-block">
                                    Lihat Tanggapan
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p class="text-center">Data Tidak Ada!</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</section>
@endsection