@extends('template.template')

@section('title', 'Tambah materi')

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
                <li>Tambah Materi</li>
            </ul>
        </div>

        <div class="category">
            <p>Tambah Materi</p>
            <div class="formTambahMateri">
                @if (session()->has('tambahMateriBerhasil'))
                    <div class="pesanTambahkanMateri">
                        <p>
                            {{ session('tambahMateriBerhasil') }}
                        </p>
                    </div>
                @endif

                @if (session()->has('tambahMateriGagal'))
                    <div class="pesanTambahkanMateri2">
                        <p>
                            {{ session('tambahMateriGagal') }}
                        </p>
                    </div>
                @endif
                
                <form action="/kelola-materi/tambahmateri" method="post" enctype="multipart/form-data">
                    @csrf
                    <span>Judul Materi</span>
                    <input type="text" name="judulMateri" value="{{ old('judulMateri') }}">
                    @error('judulMateri')
                        <i style="color: red; font-size: 13px;">
                            {{ $message }}
                        </i>
                    @enderror
                    <span>Deskripsi Materi</span>
                    <textarea name="deskripsiMateri" id="formatDeskripsi" cols="30" rows="10">{{ old('deskripsiMateri') }}</textarea>
                    @error('deskripsiMateri')
                        <i style="color: red; font-size: 13px;">
                            {{ $message }}
                        </i>
                    @enderror
                    <span>Tingkat Pendidikan</span>
                    <select name="tingkatPendidikan" id="">
                        <option value="">---</option>
                        <option value="smp">SMP</option>
                        <option value="sma">SMA</option>
                        <option value="kuliah">Kuliah</option>
                    </select>
                    @error('tingkatPendidikan')
                        <i style="color: red; font-size: 13px;">
                            {{ $message }}
                        </i>
                    @enderror
                    <span>Upload File PDF</span>
                    <input type="file" name="pdfFile" id="">
                    @error('pdfFile')
                        <i style="color: red; font-size: 13px;">
                            {{ $message }}
                        </i>
                    @enderror
                    <span>Link video</span>
                    <input type="text" name="ytLink" value="{{ old('ytLink') }}">
                    @error('ytLink')
                        <i style="color: red; font-size: 13px;">
                            {{ $message }}
                        </i>
                    @enderror
                    <button type="submit">Upload</button>
                </form>
            </div>
        </div>
    </div>
@endsection