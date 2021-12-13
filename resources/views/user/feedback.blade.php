@extends('template.template')

@section('title', 'Feedback')

@section('navItem')
    <a href="{{ URL('/dashboard') }}"title="Dashboard"><i class="fas fa-home"></i></a>
    <a href="{{ URL('/materi') }}" title="Materi Pembelajaran"><i class="fas fa-book-open"></i></a>
    <a href="{{ URL('/donasi') }}" title="Berikan Donasi"><i class="fas fa-donate"></i></a>
    <a href="{{ URL('/feedback') }}" class="active" title="Umpan Balik"><i class="fas fa-comments"></i></a>
    <a href="{{ URL('/leaderboard') }}" title="Leaderboard"><i class="fas fa-chart-line"></i></a>
@endsection

@section('profileLink')
    <a href="{{ URL('/profilee') }}">Profil</a>
@endsection

@section('bottomNav')
    <a href="{{ URL('/dashboard') }}" title="Dashboard"><i class="fas fa-home"></i></a>
    <a href="{{ URL('/materi') }}" title="Materi Pembelajaran"><i class="fas fa-book-open"></i></a>
    <a href="{{ URL('/donasi') }}" title="Berikan Donasi"><i class="fas fa-donate"></i></a>
    <a href="{{ URL('/feedback') }}" class="active" title="Umpan Balik"><i class="fas fa-comments"></i></a>
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
            <p>Feedback</p>
            <ul class="breadcrumb">
                <li><a href="{{ URL('/dashboard') }}">Dashboard</a></li>
                <li>Feedback</li>
            </ul>
        </div>

        <div class="feedbackContainer">

            @if (session()->has('berhasilFeedback'))
                <div class="successFeedback">
                    <h4>
                        {{ session('berhasilFeedback') }} 
                    </h4>
                </div>
            @endif
            
            @if (session()->has('gagalFeedback'))
                <div class="failFeedback">
                    <h4>
                        {{ session('gagalFeedback') }} 
                    </h4>
                </div>
            @endif

            <form action="{{ URL('/feedback/send') }}" method="post">
                @csrf
                <input type="hidden" name="namaPengirim" value="{{ Auth::user()->name }}">
                <input type="hidden" name="name" value="{{ Auth::user()->username }}">
                <p>Masukan / pendapat dan saran</p>
                <textarea name="isiFeedback" id="" cols="30" rows="10" placeholder="Berikan tanggapan atau masukan anda" required>{{ old('isiFeedback') }}</textarea>
                @error('isiFeedback')
                    <span class="errorMessage">
                        {{ $message }}
                    </span>
                @enderror
                <p>Berikan rating anda</p>
                <div class="rate">
                    <input type="radio" id="star5" value="5" />
                    <label for="star5" title="text">5 stars</label>
                    <input type="radio" id="star4" value="4" />
                    <label for="star4" title="text">4 stars</label>
                    <input type="radio" id="star3" value="3" />
                    <label for="star3" title="text">3 stars</label>
                    <input type="radio" id="star2" value="2" />
                    <label for="star2" title="text">2 stars</label>
                    <input type="radio" id="star1" value="1" />
                    <label for="star1" title="text">1 star</label>
                </div>
                <input type="hidden" name="ratingValue" id="ratingValue" required>
                @error('ratingValue')
                    <span class="errorMessage">
                        {{ $message }}
                    </span>
                @enderror

                <div class="tblKirim">
                    <button type="submit">Kirim</button>
                </div>
            </form>
        </div>
        
    </div>
@endsection