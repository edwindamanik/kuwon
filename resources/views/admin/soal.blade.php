@extends('template.template')

@section('title', 'Kelola Soal')

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
            <p>Kelola Soal</p>
            <ul class="breadcrumb">
                <li><a href="{{ URL('/my') }}">Dashboard</a></li>
                <li>Kelola Soal</li>
            </ul>
        </div>

        <div class="kelolaSoal">

            <div class="card2">
                <p>Kelola Soal</p>
                <a href="#" onclick="popTambahSoal()">Tambah Soal&nbsp;&nbsp;<i class="fas fa-plus-circle"></i></a>
                <div class="popUpPendidikan" id="menuPendidikan">
                    <a href="{{ URL('/soal/tambah-soal-smp') }}">SMP</a>
                    <a href="{{ URL('/soal/tambah-soal-sma') }}">SMA</a>
                    <a href="{{ URL('/soal/tambah-soal-kuliah') }}">Kuliah</a>
                </div>
            </div>

            <div class="card3">
                <div class="tab">
                    <button class="tablinks" onclick="openSoal(event, 'Smp')">SMP</button>
                    <button class="tablinks" onclick="openSoal(event, 'Sma')">SMA</button>
                    <button class="tablinks" onclick="openSoal(event, 'Kuliah')">Kuliah</button>
                </div>

                <div id="Smp" class="tabcontent">
                    <div style="overflow-x:auto;">
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Kategori Soal</th>
                                <th>Jumlah Soal</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach ($soalSMP as $itemSoalSMP)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $itemSoalSMP->kategori }}</td>
                                    <td>{{ $itemSoalSMP->total }}</td>
                                    <td>
                                        <a href="/soal/{{ $itemSoalSMP->kategori }}/edit" class="btnDetail">
                                            Detail Soal
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                  
                <div id="Sma" class="tabcontent">
                    <div style="overflow-x:auto;">
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Kategori Soal</th>
                                <th>Jumlah Soal</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach ($soalSMA as $itemSoalSMA)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $itemSoalSMA->kategori }}</td>
                                    <td>{{ $itemSoalSMA->total }}</td>
                                    <td>
                                        <a href="/soal/{{ $itemSoalSMA->kategori }}/edit" class="btnDetail">
                                            Detail Soal
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                
                <div id="Kuliah" class="tabcontent">
                    <div style="overflow-x:auto;">
                        <table>
                            <tr>
                                <th>No</th>
                                <th>Kategori Soal</th>
                                <th>Jumlah Soal</th>
                                <th>Aksi</th>
                            </tr>
                            @foreach ($soalKULIAH as $itemSoalKULIAH)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $itemSoalKULIAH->kategori }}</td>
                                    <td>{{ $itemSoalKULIAH->total }}</td>
                                    <td>
                                        <a href="/soal/{{ $itemSoalKULIAH->kategori }}/edit" class="btnDetail">
                                            Detail Soal
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

<script>

function popTambahSoal() {
    document.getElementById("menuPendidikan").classList.toggle("showPendidikan");
}

function openSoal(evt, pendidikan) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(pendidikan).style.display = "block";
    evt.currentTarget.className += " active";
}

</script>