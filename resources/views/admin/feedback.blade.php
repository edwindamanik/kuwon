@extends('template.template')

@section('title', 'Feedback')

@section('navItem')
    <a href="{{ URL('/my') }} "title="Dashboard"><i class="fas fa-home"></i></a>
    <a href="{{ URL('/kelola-materi') }}" title="Kelola Materi"><i class="fas fa-book-open"></i></a>
    <a href="{{ URL('/umpanBalik') }}" class="active"  title="Umpan Balik"><i class="fas fa-comments"></i></a>
    <a href="{{ URL('/my/leaderboard') }}" title="Leaderboard"><i class="fas fa-chart-line"></i></a>
    <a href="{{ URL('/soal') }}" title="Kelola Soal"><i class="fas fa-tasks"></i></a>
@endsection

@section('profileLink')
    <a href="{{ URL('/profile') }}">Profil</a>
@endsection

@section('bottomNav')
    <a href="{{ URL('/my') }}" title="Dashboard"><i class="fas fa-home"></i></a>
    <a href="{{ URL('/kelola-materi') }}"title="Kelola Materi"><i class="fas fa-book-open"></i></a>
    <a href="{{ URL('/umpanBalik') }}" class="active" title="Umpan Balik"><i class="fas fa-comments"></i></a>
    <a href="{{ URL('/my/leaderboard') }}" title="Leaderboard"><i class="fas fa-chart-line"></i></a>
    <a href="{{ URL('/soal') }}" title="Kelola Soal"><i class="fas fa-tasks"></i></a>
@endsection

@section('mainContent')
    <div class="container">
        <div class="title">
            <p>Feedback</p>
            <ul class="breadcrumb">
                <li><a href="{{ URL('/my') }}">Dashboard</a></li>
                <li>Feedback</li>
            </ul>
        </div>

        <div class="feedbackRespons">
            @foreach ($pemberiRespon as $itemRespon)
                <div class="card">
                    <div class="firstRow">
                        <img src="{{ URL::asset('storage/'.$itemRespon->photo) }}" alt="Profil">
                        <span>{{ $itemRespon->name }}</span>
                    </div>
                    <pre>
                        <p>{{ $itemRespon->isiFeedback }}</p>
                    </pre>
                </div>
            @endforeach

            <span class="paginationFeedback">
                {{ $pemberiRespon->links('vendor.pagination.tailwind') }}
            </span>
        </div>
        
    </div>
@endsection