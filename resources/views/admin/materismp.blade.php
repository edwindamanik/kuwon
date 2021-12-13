@extends('template.template')

@section('title', 'Kelola materi SMP')

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
                <li>Materi SMP</li>
            </ul>
        </div>

        <div class="category">
            <p>Ini materi SMP</p>
            <div class="formSearch">
                <form action="{{ URL('/kelola-materi/smp/search') }}" method="get">
                    <input type="text" name="search" placeholder="Masukkan keyword pencarian" required>
                    <button type="submit">Cari</button>
                </form>
            </div>

            <div class="notifUpdate">
                @if (session()->has('updateBerhasil'))
                    <p>
                        {{ session('updateBerhasil') }}
                    </p>
                @endif
            </div>
            <div class="notifUpdate">
                @if (session()->has('dataBerhasilDihapus'))
                    <p>
                        {{ session('dataBerhasilDihapus') }}
                    </p>
                @endif
            </div>

            <div class="tabelMateri" style="overflow-x:auto;">
                @if ($posts->isNotEmpty())
                        <table class="styled-table">
                            <thead>
                                <tr>
                                    <th colspan="1">No</th>
                                    <th colspan="1">Judul Materi</th>
                                    <th colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                <tr>
                                    <td colspan="1">{{ $loop->iteration; }}</td>
                                    <td colspan="1">{{ $post->judulMateri }}</td>
                                    <td colspan="1"><a href="/kelola-materi/smp/{{ $post->id }}/edit" class="editButton">Edit</a></td>
                                    <td colspan="1"><a href="/kelola-materi/smp/{{ $post->id }}/delete" onclick="return confirm('Apakah anda yakin ingin menghapus materi ini ?')" class="deleteButton">Hapus</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                @else

                <div>
                    <h2>No posts found</h2>
                </div>
                        
                @endif
            </div>
        </div>
    </div>
@endsection