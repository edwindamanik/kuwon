@extends('template.template')

@section('title', 'Profil')

@section('navItem')
    <a href="{{ URL('/dashboard') }}" title="Dashboard"><i class="fas fa-home"></i></a>
    <a href="{{ URL('/materi') }}" title="Materi Pembelajaran"><i class="fas fa-book-open"></i></a>
    <a href="{{ URL('/donasi') }}" title="Berikan Donasi"><i class="fas fa-donate"></i></a>
    <a href="{{ URL('/feedback') }}" title="Umpan Balik"><i class="fas fa-comments"></i></a>
    <a href="{{ URL('/leaderboard') }}" title="Leaderboard"><i class="fas fa-chart-line"></i></a>
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
            <p>Profil</p>
        </div>

        <div class="dataDiriPelajar">
            <div class="fotoPelajar">
                <img src="{{ URL::asset('storage/'.$photo) }}" alt="Foto Pelajar">
            </div>
            <div class="iconEditProfil">
                <button type="click" onclick="enalbeDisable()" title="Edit Profil">
                    <i class="far fa-edit"></i>
                </button>
            </div>
            <form action="{{ URL('/profilee/edit') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ Auth::user()->id }}" required>
                <span>Nama</span>
                <input type="text" name="name" id="inputProfil" value="{{ Auth::user()->name }}" required disabled>
                <span>Nomor Telepon</span>
                <input type="text" name="phone" id="inputProfil2" value="{{ Auth::user()->phone }}" required disabled>
                <span>Tanggal Lahir</span>
                <input type="date" name="birth" id="inputProfil3" value="{{ Auth::user()->birth }}" required disabled>
                <span>Tingkat Pendidikan</span>
                <select name="education" id="inputProfil4" required disabled>
                    <option value="smp" {{ $education == "smp" ? 'selected' : '' }}>SMP</option>
                    <option value="sma" {{ $education == "sma" ? 'selected' : '' }}>SMA</option>
                    <option value="kuliah" {{ $education == "kuliah" ? 'selected' : '' }}>Kuliah</option>
                </select>
                <span>Foto Profil</span>
                <input type="file" name="photo" id="inputProfil5" value="{{ Auth::user()->photo }}" required disabled>
                <input type="submit" id="tblEditProfile" value="Edit Profile" disabled></input>
            </form>
        </div>

    </div>
@endsection