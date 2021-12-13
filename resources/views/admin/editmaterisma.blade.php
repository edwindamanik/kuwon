@extends('template.template')

@section('title', 'Edit materi')

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
                <li><a href="{{ URL('/kelola-materi') }}">Kelola Materi</a></li>
                <li><a href="{{ URL('/kelola-materi/sma') }}">Materi SMA</a></li>
                <li>Edit Materi SMA</li>
            </ul>
        </div>

        <div class="category">
            <p>Edit Materi</p>
            <div class="formEditMateri">
                @foreach ($editDataMateri as $materi)
                    <form action="/kelola-materi/sma/update" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $materi->id }}" required>
                        <span>Judul Materi</span>
                        <input type="text" name="judulMateri" value="{{ $materi->judulMateri }}" required>
                        <span>Deskripsi Materi</span>
                        <textarea type="text" name="deskripsiMateri" required>{{ $materi->deskripsiMateri }}</textarea>
                        <span>Tingkat Pendidikan</span>
                        <select name="tingkatPendidikan" required>
                            <option value="smp" {{ $materi->tingkatPendidikan == "smp" ? 'selected' : '' }}>SMP</option>
                            <option value="sma" {{ $materi->tingkatPendidikan == "sma" ? 'selected' : '' }}>SMA</option>
                            <option value="kuliah" {{ $materi->tingkatPendidikan == "kuliah" ? 'selected' : '' }}>Kuliah</option>
                        </select>
                        <span>Upload File PDF</span>
                        <input type="file" name="pdfFile" value="{{ $materi->pdfFile }}" required>
                        <span>Link Video</span>
                        <input type="text" name="ytLink" value="{{ $materi->ytLink }}" required>
                        <button type="submit">Edit Materi</button>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection