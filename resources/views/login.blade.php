<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('style/signin/login.css') }}">
    <title>Masuk - KUWON</title>
</head>
<body>
    
    <div class="container">
        <div class="leftGrid">
            <div class="logo">
                <a href="{{ URL('/') }}">
                    <img src="{{ URL::asset('images/logo.png') }}" alt="Logo">
                </a>
            </div>

            <h1>Mulai Belajar Matematika dengan <span>KUWON</span></h1>
            <div class="studentImages">
                <img src="{{ URL::asset('images/studentLogin.png') }}" alt="Student">
            </div>
        </div>

        <div class="rightGrid">
            <div class="logo">
                <a href="{{ URL('/') }}">
                    <img src="{{ URL::asset('images/logo.png') }}" alt="Logo">
                </a>
            </div>
            <h4>Masuk</h4>
            <p>Masuk ke dalam sistem pembelajaran dengan menggunakan akun yang sudah didaftarkan sebelumnya</p>
            
            <form action="{{ URL('/login') }}" method="post">
            @csrf
            <div class="formLogin">

                @if (session()->has('gagalLogin'))
                    <span class="errorMessage">
                        {{ session('gagalLogin') }}
                    </span>
                @endif

                @if (session()->has('successRegister'))
                    <span class="successMessage">
                        {{ session('successRegister') }} 
                    </span>
                @endif
        
                @if (session()->has('noAccess'))
                    <span class="errorMessage">
                        {{ session('noAccess') }}
                    </span>
                @endif

                <span>Username</span>
                <input type="text" name="username" value="{{ old('username') }}" autofocus>
                @error('username')
                    <span class="errorMessage">
                        {{ $message }}
                    </span>
                @enderror

                <span>Password</span>
                <input type="password" name="password" id="">
                @error('password')
                    <span class="errorMessage">
                        {{ $message }}
                    </span>
                @enderror

                <button type="submit">Masuk</button>

                <p class="haveAccount">Belum punya akun ? <a href="{{ URL('/register') }}">Daftar</a> </p>
            </div>
            </form> 

        </div>
    </div>

</body>
</html>