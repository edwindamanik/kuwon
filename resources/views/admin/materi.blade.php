@extends('template.template')

@section('title', 'Kelola materi')

@section('navItem')
    <a href="{{ URL('/my') }}" title="Dashboard"><i class="fas fa-home"></i></a>
    <a href="{{ URL('/kelola-materi') }}" class="active" title="Kelola Materi"><i class="fas fa-book-open"></i></a>
    <a href="{{ URL('/umpanBalik') }}" title="Umpan Balik"><i class="fas fa-comments"></i></a>
    <a href="{{ URL('/my/leaderboard') }}" title="Leaderboard"><i class="fas fa-chart-line"></i></a>
    <a href="{{ URL('/soal') }}" title="Kelola Soal"><i class="fas fa-tasks"></i></a>
@endsection

@section('profileLink')
    <a href="{{ URL('/profile') }}">Profil</a>
@endsection

@section('bottomNav')
    <a href="{{ URL('/my') }}" title="Dashboard"><i class="fas fa-home"></i></a>
    <a href="{{ URL('/kelola-materi') }}" class="active" title="Kelola Materi"><i class="fas fa-book-open"></i></a>
    <a href="{{ URL('/umpanBalik') }}" title="Umpan Balik"><i class="fas fa-comments"></i></a>
    <a href="{{ URL('/my/leaderboard') }}" title="Leaderboard"><i class="fas fa-chart-line"></i></a>
    <a href="{{ URL('/soal') }}" title="Kelola Soal"><i class="fas fa-tasks"></i></a>
@endsection

@section('mainContent')
    <div class="container">
        <div class="title">
            <p>Kelola Materi</p>
            <ul class="breadcrumb">
                <li><a href="{{ URL('/my') }}">Dashboard</a></li>
                <li>Kelola Materi</li>
            </ul>
        </div>

        <div class="category">
            <p>Pilih kategori</p>
            <div class="tambahMateri">
                <a href="{{ URL('/kelola-materi/tambahmateri') }}">Tambah Materi&nbsp;&nbsp;<i class="fas fa-plus-circle"></i></a>
            </div>
            <div class="cards">
                <a href="{{ URL('/kelola-materi/smp') }}" class="card1">
                    <img src="{{ URL::asset('images/smpLogo.png') }}" alt="">
                </a>
                <a href="{{ URL('/kelola-materi/sma') }}" class="card2">
                    <img src="{{ URL::asset('images/smaLogo.png') }}" alt="">
                </a>
                <a href="{{ URL('/kelola-materi/kuliah') }}" class="card3">
                    <img src="{{ URL::asset('images/kuliahLogo.png') }}" alt="">
                </a>
            </div>
        </div>
    </div>
@endsection