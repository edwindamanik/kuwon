@extends('template.template')

@section('title', 'Materi Pembelajaran')

@section('navItem')
    <a href="{{ URL('/dashboard') }}"title="Dashboard"><i class="fas fa-home"></i></a>
    <a href="{{ URL('/materi') }}" class="active"  title="Materi Pembelajaran"><i class="fas fa-book-open"></i></a>
    <a href="{{ URL('/donasi') }}" title="Berikan Donasi"><i class="fas fa-donate"></i></a>
    <a href="{{ URL('/feedback') }}" title="Umpan Balik"><i class="fas fa-comments"></i></a>
    <a href="{{ URL('/leaderboard') }}" title="Leaderboard"><i class="fas fa-chart-line"></i></a>
@endsection

@section('profileLink')
    <a href="{{ URL('/profilee') }}">Profil</a>
@endsection

@section('bottomNav')
    <a href="{{ URL('/dashboard') }}" title="Dashboard"><i class="fas fa-home"></i></a>
    <a href="{{ URL('/materi') }}" class="active" title="Materi Pembelajaran"><i class="fas fa-book-open"></i></a>
    <a href="{{ URL('/donasi') }}" title="Berikan Donasi"><i class="fas fa-donate"></i></a>
    <a href="{{ URL('/feedback') }}" title="Umpan Balik"><i class="fas fa-comments"></i></a>
    <a href="{{ URL('/leaderboard') }}" title="Leaderboard"><i class="fas fa-chart-line"></i></a>
@endsection

@section('contentPoint')
    <div class="pointContent">
        <p><i class="fas fa-star" style="margin-right: 10px;"></i>{{ Auth::user()->point }}</p>
    </div>
@endsection

@section('mainContent')
    <div class="container">
        <div class="title">
            <p>Materi Pembelajaran</p>
            <ul class="breadcrumb">
                <li><a href="{{ URL('/dashboard') }}">Dashboard</a></li>
                <li><a href="{{ URL('/materi') }}">Materi Pembelajaran</a></li>
                <li>
                    @foreach ($materiDipilih as $itemJudul)
                        {{ $itemJudul->judulMateri }}
                    @endforeach
                </li>
            </ul>
        </div>
        <div class="contentForUser">
            @foreach ($materiDipilih as $itemMateri)
                <h4>{{ $itemMateri->judulMateri }}</h4>
                <pre>{{ $itemMateri->deskripsiMateri }}</pre>
                <div id="tutorial-pdf-responsive" class="custom1">
                    <div class="custom2">
                        <iframe src="{{ URL::asset('storage/'.$pdfName) }}" width="100%" height="500px"></iframe>
                    </div>
                </div>
                <div id="tutorial-pdf-responsive" class="videoFrame">
                    <div class="videoFrame2">
                        <iframe width="100%" height="500" src="{{ $itemMateri->ytLink }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>

                @if ($countMateri > 1)
                    <a href="/latihanSoal/{{ $itemMateri->judulMateri }}" class="linkKeLatihan">Latihan {{ $itemMateri->judulMateri }}</a>
                @else
                    <a href="#" style="background: gray" class="linkKeLatihan">Latihan Belum Diupload</a>
                @endif
                
            @endforeach
        </div>
    </div>
@endsection