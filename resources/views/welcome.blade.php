<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SMK AL-HUDA KEDIRI</title>
    <link rel="stylesheet/css" href="style.css">
    <link rel="icon" type="image/png" href="{{asset('/assets/img/alhuda.png')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <style>
        .btn {
            background-color: #dfa710;
            /* Green */
            border: none;
            border-radius: 20px;
            color: white;
            padding: 10px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
        }

        body {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
            url("{{asset('assets/img/smk_alhuda.jpg')}}");
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar  navbar-expand-lg navbar-dark shadow-5-strong">
        <div class="container">
            <img src="{{asset('assets/img/alhuda.png')}}" alt="" style="width:30px;">&nbsp;
            <a class="navbar-brand" href="#" style="font-weight: bold;">SMK AL-HUDA</a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a href="{{url('login')}}" class="btn text-white">Login</a>
                    </li>
                    @endif
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <br><br>
    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center text-white">
            <h5 style="color:#dfa710;">SELAMAT DATANG</h5>
            <p class="lead" style="font-size:50px; font-weight: bold; font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">SMK AL-HUDA KOTA KEDIRI</p>
            <p class="lead">SMK AL-HUDA Kota Kediri membuka kelas ACP. Axioo Class Program (ACP) adalah merupakan program sosial dari PT Tera Data Indonusa Tbk (TDI) atau Axioo Indonesia.
                Program ini bertujuan menyiapkan tenaga terampil yang sesuai dengan kebutuhan industri lewat program sinkronisasi
                kurikulum, workshop berkelanjutan bagi guru, pembelajaran berbasis IT serta validasi sertifikasi bertaraf internasional.</p>
            <a href="{{url('home')}}" class="btn">Get Started</a>
        </div>
    </div>



    <!-- Javascript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>