@extends('template.template')

@section('title', 'Dashboard')

@section('navItem')
    <a href="{{ URL('/dashboard') }}" class="active" title="Dashboard"><i class="fas fa-home"></i></a>
    <a href="{{ URL('/materi') }}" title="Materi Pembelajaran"><i class="fas fa-book-open"></i></a>
    <a href="{{ URL('/donasi') }}" title="Berikan Donasi"><i class="fas fa-donate"></i></a>
    <a href="{{ URL('/feedback') }}" title="Umpan Balik"><i class="fas fa-comments"></i></a>
    <a href="{{ URL('/leaderboard') }}" title="Leaderboard"><i class="fas fa-chart-line"></i></a>
@endsection

@section('profileLink')
    <a href="{{ URL('/profilee') }}">Profil</a>
@endsection

@section('bottomNav')
    <a href="{{ URL('/dashboard') }}" class="active" title="Dashboard"><i class="fas fa-home"></i></a>
    <a href="{{ URL('/materi') }}" title="Materi Pembelajaran"><i class="fas fa-book-open"></i></a>
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
            <p>Dashboard</p>
            <span>Halo, {{ Auth::user()->name }}</span>
        </div>

        <div class="grafikPengerjaan">
            <div class="bagianPertama">
                <p><i class="fas fa-tasks"></i>&nbsp;&nbsp;Total Soal Yang Sudah Dikerjakan</p>
                <span>
                    {{ $countMapelDikerjakan }}
                </span>
            </div>

            <div class="bagianKedua">
                <p><i class="fas fa-book"></i>&nbsp;&nbsp;Total Materi Pelajaran Matematika</p>
                <span>
                    {{ $countMateri }}
                </span>
            </div>
        </div>
    </div>
@endsection