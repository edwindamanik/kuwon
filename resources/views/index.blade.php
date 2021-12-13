<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('style/home/style.css') }}">
    <link rel="stylesheet" href="{{ asset('style/glider.min.css') }}">
    <title>KUWON</title>
</head>
<body>
    
    <div class="navbar">
        <div class="leftGrid">
            <div class="logo">
                <a href="#">
                    <img src="{{ URL::asset('images/logo.png') }}" alt="Logo KUWON">
                </a>
            </div>

            <div class="navItems">
                <a href="#" class="active">Beranda</a>
                <a href="#">Tentang Kami</a>
                <a href="#">Panduan</a>
            </div>
        </div>

        <div class="rightGrid">
            <a href="{{ URL('/login') }}">Masuk</a>
            <a href="{{ URL('/register') }}" class="btnRegister">Daftar</a>
        </div>

        <div class="btnBar" id="buttonBar">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
    </div>

    <div id="navbarResponsive">
        <div class="btnClose">
            <i class="fa fa-times" id="buttonClose" aria-hidden="true"></i>
        </div>
        <div class="navItems">
            <a href="#" class="active">Beranda</a>
            <a href="#">Tentang Kami</a>
            <a href="#">Panduan</a>
            <a href="{{ URL('/login') }}">Masuk</a>
            <a href="{{ URL('/register') }}">Daftar</a>
        </div>
    </div>

    <div class="container">
        <div class="jumbotron">
            <div class="leftGrid">
                <p class="sign">Online Course</p>
                <h1>Belajar <span>Matematika</span> Dengan Materi Terstruktur</h1>
                <p class="desc">Belajar dengan materi lengkap dan sister terstruktur dilengkapi dengan soal tes.</p>
                <a href="{{ URL('/register') }}" class="btnStart">Mulai Sekarang</a>
            </div>

            <div class="rightGrid">
                <div class="frameImage">
                    <img src="{{ URL::asset('images/student.png') }}" alt="Student Image">
                </div>
            </div>
        </div>

        <div class="whyKuwon">
            <h1>Mengapa <span>KUWON</span> ?</h1>
            <div class="content">
                <div class="card1">
                    <img src="{{ URL::asset('images/materiBanner.png') }}" alt="Banner materi">
                    <h4>Materi lengkap</h4>
                    <p>Dilengkapi dengan materi pembelajaran terstruktur dan lengkap</p>
                </div>
                <div class="card2">
                    <img src="{{ URL::asset('images/simpanBanner.png') }}" alt="Banner simpan">
                    <h4>Simpan materi</h4>
                    <p>Materi pembelajaran dapat disimpan atau diunduh</p>
                </div>
                <div class="card3">
                    <img src="{{ URL::asset('images/kurikulimBanner.png') }}" alt="Banner kurikulum">
                    <h4>Kurikulum Terbaru</h4>
                    <p>Materi pembelajaran akan disesuaikan dengan kurikulum terbaru</p>
                </div>
                <div class="card4">
                    <img src="{{ URL::asset('images/gratisBanner.png') }}" alt="Banner gratis">
                    <h4>Gratis</h4>
                    <p>Course ini memberikan materi pembelajaran dan latihan secara gratis</p>
                </div>
            </div>
        </div>

        <div class="testimoni">
            <h1>Testimoni Pengguna</h1>
            <div class="content">
                <div class="glider-contain multiple">
                    <button class="glider-prev">
                        <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    </button>

                    <div class="glider">
                        <div class="tester1">
                            <div class="leftGrid">
                                <img src="{{ URL::asset('images/tester.png') }}" alt="Penguji">
                            </div>
                            <div class="rightGrid">
                                <h4>Hartono Dimas</h4>
                                <p>“Website course KUWON sangat membantu saya dalam belajar matematika. Dengan bentuk persaingan yang membuat saya menjadi merasa lebih tertantang udah belajar matematika”</p>
                            </div>
                        </div>
                        <div class="tester2">
                            <div class="leftGrid">
                                <img src="{{ URL::asset('images/tester2.png') }}" alt="Penguji">
                            </div>
                            <div class="rightGrid">
                                <h4>Martinus Panggabean</h4>
                                <p>“Website course KUWON sangat membantu saya dalam belajar matematika. Dengan bentuk persaingan yang membuat saya menjadi merasa lebih tertantang udah belajar matematika”</p>
                            </div>
                        </div>
                        <div class="tester3">
                            <div class="leftGrid">
                                <img src="{{ URL::asset('images/tester3.png') }}" alt="Penguji">
                            </div>
                            <div class="rightGrid">
                                <h4>Sihol</h4>
                                <p>“Website course KUWON sangat membantu saya dalam belajar matematika. Dengan bentuk persaingan yang membuat saya menjadi merasa lebih tertantang udah belajar matematika”</p>
                            </div>
                        </div>
                        <div class="tester4">
                            <div class="leftGrid">
                                <img src="{{ URL::asset('images/tester.png') }}" alt="Penguji">
                            </div>
                            <div class="rightGrid">
                                <h4>Lungun</h4>
                                <p>“Website course KUWON sangat membantu saya dalam belajar matematika. Dengan bentuk persaingan yang membuat saya menjadi merasa lebih tertantang udah belajar matematika”</p>
                            </div>
                        </div>
                    </div>

                    <button class="glider-next">
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </button>

                    <div id="dots" class="glider-dots"></div>

                </div>
            </div>
        </div>

        <div class="footer">
            <div class="col1">
                <a href="#">
                    <img src="{{ URL::asset('images/logo.png') }}" alt="">
                </a>
                <h4>Course Matematika dengan materi terpadu, lengkap, dan terstruktur</h4>
                <p>Hubungi kami: 085262607679</p>
            </div>
            <div class="col2">
                <h4>Informasi</h4>
                <a href="#">Tentang kami</a>
                <a href="#">Panduan</a>
            </div>
            <div class="col3">
                <h4>Sosial Media</h4>
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
                <a href="#">Twitter</a>
            </div>
            <div class="col4">
                <h4>Link Pendukung</h4>
                <a href="{{ URL('/register') }}">Daftar</a>
                <a href="{{ URL('/login') }}">Masuk</a>
            </div>
            <div class="col5">

            </div>
        </div>
    </div>

    <script src="{{ URL::asset('script/glider.js') }}"></script>
    <script src="{{ URL::asset('script/script.js') }}"></script>
    
</body>
</html>


{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>KUWON</title>
</head>
<body>
    
    <p>Ini adalah index</p>
    <a href="{{ URL('/login') }}">Masuk</a>
    <a href="{{ URL('/register') }}">Daftar</a>

</body>
</html>
 --}}
