@extends('template.template')

@section('title', 'My Dashboard')

@section('navItem')
    <a href="{{ URL('/my') }}" class="active" title="Dashboard"><i class="fas fa-home"></i></a>
    <a href="{{ URL('/kelola-materi') }}" title="Kelola Materi"><i class="fas fa-book-open"></i></a>
    <a href="{{ URL('/umpanBalik') }}" title="Umpan Balik"><i class="fas fa-comments"></i></a>
    <a href="{{ URL('/my/leaderboard') }}" title="Leaderboard"><i class="fas fa-chart-line"></i></a>
    <a href="{{ URL('/soal') }}" title="Kelola Soal"><i class="fas fa-tasks"></i></a>
@endsection

@section('profileLink')
    <a href="{{ URL('/profile') }}">Profil</a>
@endsection

@section('bottomNav')
    <a href="{{ URL('/my') }}" class="active" title="Dashboard"><i class="fas fa-home"></i></a>
    <a href="{{ URL('/kelola-materi') }}" title="Kelola Materi"><i class="fas fa-book-open"></i></a>
    <a href="{{ URL('/umpanBalik') }}" title="Umpan Balik"><i class="fas fa-comments"></i></a>
    <a href="{{ URL('/my/leaderboard') }}" title="Leaderboard"><i class="fas fa-chart-line"></i></a>
    <a href="{{ URL('/soal') }}" title="Kelola Soal"><i class="fas fa-tasks"></i></a>
@endsection

@section('mainContent')
    <div class="container">
        <div class="title">
            <p>Dashboard</p>
            <span>Halo, {{ Auth::user()->name }}</span>
        </div>

        <div class="graph">
            <div class="graph1">
                <div class="gambarKeterangan">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <p>Total Pengguna</p>
                <i>{{ $totalUser }}</i>
            </div>
            <div class="graph2">
                <div class="gambarKeterangan">
                    <i class="fas fa-file-alt"></i>
                </div>
                <p>Jumlah Materi yang diupload</p>
                <i>{{ $totalMateri }}</i>
            </div>
            <div class="graph3">
                <div class="gambarKeterangan">
                    <i class="fas fa-plus"></i>
                </div>
                <a href="{{ URL('/kelola-materi/tambahmateri') }}">Tambah Materi</a>
            </div>
        </div>
    </div>
@endsection