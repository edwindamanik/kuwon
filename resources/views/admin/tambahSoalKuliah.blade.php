@extends('template.template')

@section('title', 'Tambah Soal Kuliah')

@section('navItem')
    <a href="{{ URL('/my') }}"title="Dashboard"><i class="fas fa-home"></i></a>
    <a href="{{ URL('/kelola-materi') }}" title="Kelola Materi"><i class="fas fa-book-open"></i></a>
    <a href="{{ URL('/umpanBalik') }}" title="Umpan Balik"><i class="fas fa-comments"></i></a>
    <a href="{{ URL('/my/leaderboard') }}" title="Leaderboard"><i class="fas fa-chart-line"></i></a>
    <a href="{{ URL('/soal') }}" class="active" title="Kelola Soal"><i class="fas fa-tasks"></i></a>
@endsection

@section('profileLink')
    <a href="{{ URL('/profile') }}">Profil</a>
@endsection

@section('bottomNav')
    <a href="{{ URL('/my') }}" title="Dashboard"><i class="fas fa-home"></i></a>
    <a href="{{ URL('/kelola-materi') }}"title="Kelola Materi"><i class="fas fa-book-open"></i></a>
    <a href="{{ URL('/umpanBalik') }}"title="Umpan Balik"><i class="fas fa-comments"></i></a>
    <a href="{{ URL('/my/leaderboard') }}" title="Leaderboard"><i class="fas fa-chart-line"></i></a>
    <a href="{{ URL('/soal') }}" class="active" title="Kelola Soal"><i class="fas fa-tasks"></i></a>
@endsection

@section('mainContent')
    <div class="container">
        <div class="title">
            <p>Tambah Soal</p>
            <ul class="breadcrumb">
                <li><a href="{{ URL('/my') }}">Dashboard</a></li>
                <li><a href="{{ URL('/soal') }}">Kelola Soal</a></li>
                <li>Tambah Soal Kuliah</li>
            </ul>
        </div>

        <div class="contentTambahSoal">

            @if (session()->has('tambahSoalBerhasil'))
                <div class="pesanTambahkanMateri">
                    <p>
                        {{ session('tambahSoalBerhasil') }}
                    </p>
                </div>
            @endif
            
            <form action="{{ URL('/soal/prosesSoal') }}" method="post" enctype="multipart/form-data" id="formActionSoal3">
                @csrf
                <p>Masukkan soal ke dalam katergori materi</p>
                <select name="kategori" id="">
                    <option value="">--- Pilih ---</option>
                    @foreach ($kategoriSoal as $itemKategori)
                        <option value="{{ $itemKategori->judulMateri }}">{{ $itemKategori->judulMateri }}</option>
                    @endforeach
                </select>
                @error('kategori')
                    <i style="color: red; font-size: 13px;">
                        {{ $message }}
                    </i>
                @enderror<br>
                <div class="formatPenambahanSoal">
                    <p>Masukkan Pertanyaan</p>
                    <textarea name="soal[]" cols="30" rows="10" required>{{ old('soal') }}</textarea>
                    @error('soal')
                        <i style="color: red; font-size: 13px;">
                            {{ $message }}
                        </i>
                    @enderror<br>
                    <p>Masukkan Jawaban yang benar</p>
                    <select name="jawaban[]" required>
                        <option value="">Masukkan Option Jawaban</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                    </select>
                    @error('jawaban')
                        <i style="color: red; font-size: 13px;">
                            {{ $message }}
                        </i>
                    @enderror<br>
                    <input type="hidden" name="tingkatPendidikan" value="kuliah">
                </div>
                <div class="tambahJumlahSoal">
                    <a type="click" class="deretanSoal" onclick="deretanSoal3()">Tambah Soal&nbsp;<i class="fas fa-plus-circle"></i></a>
                </div>
                <button type="submit" form="formActionSoal2">Kirim Soal</button>
            </form>
        </div>

    </div>
@endsection

<script>

function popTambahSoal() {
    document.getElementById("menuPendidikan").classList.toggle("showPendidikan");
}
</script>