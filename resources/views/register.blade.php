<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('style/signin/login.css') }}">
    <title>Daftar - KUWON</title>
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
            <h4>Daftar</h4>
            <p>Daftarkan akun anda untuk dapat mengakses pembelajaran</p>
            <form action="/register" method="post">
                @csrf
                <div class="formLogin">
                    <div class="twoColumn">
                        <div class="firstColumn">
                            <span>Nama</span>
                            <input type="text" name="name" value="{{ old('name') }}" autofocus>
                            @error('name')
                                <span class="errorMessage">
                                    {{ $message }}
                                </span>
                            @enderror
                            <span>Tanggal Lahir</span>
                            <input type="date" name="birth" value="{{ old('birth') }}">
                            @error('birth')
                                <span class="errorMessage">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="secondColumn">
                            <span>No Telepon</span>
                            <input type="number" name="phone" id="" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="errorMessage">
                                    {{ $message }}
                                </span>
                            @enderror
                            <span>Jenjang Pendidikan</span>
                            <select name="education" id="">
                                <option value="">---</option>
                                <option value="smp">SMP</option>
                                <option value="sma">SMA</option>
                                <option value="kuliah">Kuliah</option>
                            </select>
                            @error('education')
                                <span class="errorMessage">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <input type="text" name="level" id="" value="user" style="display: none">
                    <input type="text" name="photo" id="" value="files/userPhoto.png" style="display: none">
                    <span>Username</span>
                    <input type="text" name="username" id="" value="{{ old('username') }}">
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
                    <button type="submit">Daftar</button>
                    <p class="haveAccount">Sudah punya akun ? <a href="{{ URL('/login') }}">Masuk</a> </p>
                </div>
            </form>
        </div>
    </div>

</body>
</html>