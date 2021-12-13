@extends('template.template')

@section('title', 'Soal')

@section('navItem')
    <a href="{{ URL('/dashboard') }}" title="Dashboard"><i class="fas fa-home"></i></a>
    <a href="{{ URL('/materi') }}" class="active" title="Materi Pembelajaran"><i class="fas fa-book-open"></i></a>
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
            <p>Latihan Soal</p>
            <ul class="breadcrumb">
                <li><a href="{{ URL('/dashboard') }}">Dashboard</a></li>
                <li><a href="{{ URL('/materi') }}">Materi Pembelajaran</a></li>
                <li>
                    @foreach ($materiDipilih as $itemJudul)
                        <a href="/materi-belajar/{{ $itemJudul->id }}">
                            {{ $itemJudul->judulMateri }}
                        </a>
                    @endforeach
                </li>
                <li>Latihan Soal</li>
            </ul>
        </div>

        <div class="templateSoalLatihan">
            <div class="pointContainer">
                <p>Kerjakanlah soal soal dengan teliti</p>
                <p class="pointTotal">
                    @foreach ($tampilkanPoint as $itemPoint)
                        {{ $itemPoint->point }}
                    @endforeach
                </p>
            </div>

            <form action="{{ URL('/cekPenilaian') }}" method="post">
                @csrf
                @foreach ($soal as $itemSoal)

                    @foreach ($answer as $itemAnswer)
                        @if ($itemAnswer->usernamePenjawab == Auth::user()->username && $itemAnswer->kategori == $itemSoal->kategori && $itemAnswer->soal == $itemSoal->soal && $itemAnswer->jawaban == $itemSoal->jawaban && $itemAnswer->jawabanPeserta == $itemSoal->jawaban)
                            <p style="background: rgb(110, 243, 110); color: white; padding: 10px; margin-top: 25px">Benar</p>
                        @elseif($itemAnswer->usernamePenjawab == Auth::user()->username && $itemAnswer->kategori == $itemSoal->kategori && $itemAnswer->soal == $itemSoal->soal && $itemAnswer->jawaban == $itemSoal->jawaban && $itemAnswer->jawabanPeserta != $itemSoal->jawaban)
                            <p style="background: rgb(243, 110, 110); color: white; padding: 10px; margin-top: 25px">Salah</p>
                        @endif
                    @endforeach

                    <div class="pertanyaan" @foreach ($answer as $itemAnswer)
                        @if ($itemAnswer->usernamePenjawab == Auth::user()->username && $itemAnswer->kategori == $itemSoal->kategori && $itemAnswer->soal == $itemSoal->soal && $itemAnswer->jawaban == $itemSoal->jawaban && $itemAnswer->jawabanPeserta != null)
                            style ="pointer-events: none"
                        @endif
                    @endforeach>
                        <p class="numberStyle">
                            {{ $loop->iteration }}
                        </p>
                        <input type="hidden" name="soal[]" value="{{ $itemSoal->soal }}">
                        <input type="hidden" name="usernamePenjawab[]" value="{{ Auth::user()->username }}">
                        <input type="hidden" name="kategori[]" value="{{ $itemSoal->kategori }}">
                        <input type="hidden" name="kategorii" value="{{ $itemSoal->kategori }}">
                        <input type="hidden" name="jawaban[]" value="{{ $itemSoal->jawaban }}">
                        <pre>{{ $itemSoal->soal }}</pre>
                        <p>Pilih Jawaban Anda</p>
                        <div class="optionPilihan">
                            <select name="jawabanPeserta[]">
                                <option value="">-</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                    </div>

                @endforeach

                <button type="submit" @foreach ($answer as $itemAnswer)
                    @if ($itemAnswer->usernamePenjawab == Auth::user()->username && $itemAnswer->kategori == $itemSoal->kategori && $itemAnswer->soal == $itemSoal->soal && $itemAnswer->jawaban == $itemSoal->jawaban && $itemAnswer->jawabanPeserta != null)
                        style ="pointer-events: none"
                    @endif
                @endforeach>Kirim Jawaban</button>
            </form>

        </div>
    </div>
@endsection
