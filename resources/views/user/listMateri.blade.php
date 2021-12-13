@extends('template.template')

@section('title', 'Materi')

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
            <p>List Materi</p>
            <ul class="breadcrumb">
                <li><a href="{{ URL('/dashboard') }}">Dashboard</a></li>
                <li>Materi Pembelajaran</li>
            </ul>
        </div>
        <div class="listMateri">
            <div class="formSearch">
                <form action="{{ URL('/materi/search') }}" method="get">
                    <input type="text" name="search" id="" placeholder="Masukkan judul materi yang akan dicari" required>
                    <button type="submit">Cari</button>
                </form>
            </div>

            <div class="materiContainer">
                @if ($posts->isNotEmpty())
                    @foreach ($posts as $item)
                    <a href="/materi-belajar/{{ $item->id }}"><i class="fas fa-arrow-circle-right"></i>{{ $item->judulMateri }}</a>
                    @endforeach 

                @else
                <div>
                    <h2>No posts found</h2>
                </div>

                @endif
            </div>
        </div>
    </div>
@endsection