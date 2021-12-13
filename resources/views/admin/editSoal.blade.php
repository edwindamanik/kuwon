@extends('template.template')

@section('title', 'Edit Soal')

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
                <li>Edit Soal</li>
            </ul>
        </div>

        <div class="contentTambahSoal">

            @if (session()->has('SoalBerhasilDihapus'))
                <div class="pesanTambahkanMateri">
                    <p>
                        {{ session('SoalBerhasilDihapus') }}
                    </p>
                </div>
            @endif
            <br>
            <form action="{{ URL('/soal/prosesEditSoal') }}" method="post" enctype="multipart/form-data" id="formEditSoal">
                @csrf
                @foreach ($isiSoal as $itemIsiSoal)
                    <input type="hidden" name="kategori" value="{{ $itemIsiSoal->kategori }}"> 
                    <input type="hidden" name="id[]" value="{{ $itemIsiSoal->id }}"> 
                    <input type="hidden" name="tingkatPendidikan" value="{{ $itemIsiSoal->tingkatPendidikan }}"> 
                @endforeach
                @foreach ($isiSoal as $itemIsiSoal)
                    <div class="formatPenambahanSoal">
                        <p>Masukkan Pertanyaan</p>
                        <textarea name="soal[]" cols="30" rows="10" required>{{ $itemIsiSoal->soal }}</textarea>
                        @error('soal')
                            <i style="color: red; font-size: 13px;">
                                {{ $message }}
                            </i>
                        @enderror<br>
                        <p>Masukkan Jawaban yang benar</p>
                        <select name="jawaban[]" required>
                            <option value="A" {{ $itemIsiSoal->jawaban == "A" ? 'selected' : '' }}>A</option>
                            <option value="B" {{ $itemIsiSoal->jawaban == "B" ? 'selected' : '' }}>B</option>
                            <option value="C" {{ $itemIsiSoal->jawaban == "C" ? 'selected' : '' }}>C</option>
                            <option value="D" {{ $itemIsiSoal->jawaban == "D" ? 'selected' : '' }}>D</option>
                        </select>
                        <a href="/soal/hapusSoal/{{ $itemIsiSoal->id }}" onclick="return confirm('Apakah anda yakin ingin menghapus soal ini ?')" class="deleteSoal" title="Hapus Soal">
                            <i class="fas fa-trash"></i>
                        </a>
                        @error('jawaban')
                            <i style="color: red; font-size: 13px;">
                                {{ $message }}
                            </i>
                        @enderror<br>
                    </div>
                @endforeach
            </form>
            <button type="submit" form="formEditSoal">Edit Soal</button>
        </div>

    </div>
@endsection

<script>

function popTambahSoal() {
    document.getElementById("menuPendidikan").classList.toggle("showPendidikan");
}

</script>