@extends('template.template')

@section('title', 'Donasi')

@section('navItem')
    <a href="{{ URL('/dashboard') }}" title="Dashboard"><i class="fas fa-home"></i></a>
    <a href="{{ URL('/materi') }}" title="Materi Pembelajaran"><i class="fas fa-book-open"></i></a>
    <a href="{{ URL('/donasi') }}" class="active" title="Berikan Donasi"><i class="fas fa-donate"></i></a>
    <a href="{{ URL('/feedback') }}" title="Umpan Balik"><i class="fas fa-comments"></i></a>
    <a href="{{ URL('/leaderboard') }}" title="Leaderboard"><i class="fas fa-chart-line"></i></a>
@endsection

@section('profileLink')
    <a href="{{ URL('/profilee') }}">Profil</a>
@endsection

@section('bottomNav')
    <a href="{{ URL('/dashboard') }}" title="Dashboard"><i class="fas fa-home"></i></a>
    <a href="{{ URL('/materi') }}" title="Materi Pembelajaran"><i class="fas fa-book-open"></i></a>
    <a href="{{ URL('/donasi') }}" class="active" title="Berikan Donasi"><i class="fas fa-donate"></i></a>
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
            <p>Donasi</p>
            <ul class="breadcrumb">
                <li><a href="{{ URL('/dashboard') }}">Dashboard</a></li>
                <li>Donasi</li>
            </ul>
        </div>
        
        <div class="donasiContainer">
            <p>Donasi atau dukungan ini bersifat optional. Dana ini sebagai bentuk apresiasi kepada pengajar yang memberikan materi serta soal soal latihan</p>
            <div class="iconDonate">
                <i class="fas fa-hand-holding-usd"></i>
                <a target="_blank" href="https://sociabuzz.com/mahasiswaedwin/tribe">
                    Donasi / Subscription
                </a>
            </div>
        </div>

    </div>
@endsection