<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="{{ URL::asset('style/template/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
</head>
<body>
    
    <div class="leftNav">
        <div class="logo">
            <a href="#" title="KUWON">
                <img src="{{ URL::asset('images/miniLogo.png') }}" alt="Mini Logo">
            </a>
        </div>

        <div class="nav-items">
            @yield('navItem')
            {{-- <a href="#" class="active" title="Dashboard"><i class="fas fa-home"></i></a>
            <a href="#" title="Kelola Materi"><i class="fas fa-book-open"></i></a>
            <a href="#" title="Statistik Donasi"><i class="fas fa-donate"></i></a>
            <a href="#" title="Umpan Balik"><i class="fas fa-comments"></i></a>
            <a href="#" title="Leaderboard"><i class="fas fa-chart-line"></i></a> --}}
        </div>
    </div>

    <div class="topNav">

        <div class="logoResponsive">
            <img src="{{ URL::asset('images/logo.png') }}" alt="">
        </div>

        <div class="dropdown">
            @yield('contentPoint')
            <button onclick="myFunction()" class="dropbtn"><i class="fas fa-user"></i></button>
            <div id="myDropdown" class="dropdown-content">
                @yield('profileLink')
                {{-- <a href="{{ URL('/profile') }}">Profil</a> --}}
                <a href="{{ URL('/logout') }}" class="btnUser" >Keluar</a>
            </div>
        </div>

    </div>

    <div class="bottomNav">
        @yield('bottomNav')
    </div>

    @yield('mainContent')
    {{-- <div class="container">
        <div class="title">
            <p>Dashboard</p>
            <span>Halo, Edwin Immanuel Damanik</span>
        </div>
    </div> --}}


    <script src="{{ URL::asset('script/script.js') }}"></script>
    <script src="{{ URL::asset('script/profile.js') }}"></script>
    <script src="{{ URL::asset('script/soal.js') }}"></script>
</body>
</html>