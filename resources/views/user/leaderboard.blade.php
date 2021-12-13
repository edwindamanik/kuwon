@extends('template.template')

@section('title', 'Leaderboard')

@section('navItem')
<a href="{{ URL('/dashboard') }}" title="Dashboard"><i class="fas fa-home"></i></a>
<a href="{{ URL('/materi') }}" title="Materi Pembelajaran"><i class="fas fa-book-open"></i></a>
<a href="{{ URL('/donasi') }}" title="Berikan Donasi"><i class="fas fa-donate"></i></a>
<a href="{{ URL('/feedback') }}" title="Umpan Balik"><i class="fas fa-comments"></i></a>
<a href="{{ URL('/leaderboard') }}" class="active" title="Leaderboard"><i class="fas fa-chart-line"></i></a>
@endsection

@section('profileLink')
<a href="{{ URL('/profilee') }}">Profil</a>
@endsection

@section('contentPoint')
<div class="pointContent">
    <p><i class="fas fa-star" style="margin-right: 10px;"></i>{{ Auth::user()->point }}</p>
</div>
@endsection

@section('mainContent')
<div class="container">
    <div class="title">
        <p>Leaderboard</p>
        <ul class="breadcrumb">
            <li><a href="{{ URL('/dashboard') }}">Dashboard</a></li>
            <li>Leaderboard</li>
        </ul>
    </div>

    <div class="leaderboardContainer">
        <div class="containerss">
            <header>
                <h3>Daftar Peringkat</h3>
            </header>
            <div class="wrapper" style="overflow-x:auto;">
                <table>
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Point</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataRank as $itemRank)
                            <tr>
                                <td class="rank">{{ $loop->iteration }}</td>
                                <td class="team">{{ $itemRank->name }}</td>
                                <td class="points">{{ $itemRank->username }}</td>
                                <td class="up-down">{{ $itemRank->point }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
