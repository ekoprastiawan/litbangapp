<!DOCTYPE html>
<html lang="en">

<!--#######################################################################################################
     * @application   <Aplikasi Analisis Data dan Visualisasi>
     * @authors  Eko Rosdiansa Prastiawan
     *           Nur Asyiah
     *           Nuril Qomaryah
     * @department   BPKP RI <Financial and Development Supervisory Board> / Badan Pengawasan Keuangan dan Pembangunan
     * @version     1.0
     * @copyright    Puslitbangwas BPKP © 2022
     * @Framework  PHP Laravel Framework 8.83
    ############################################################################################################-->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="ADVIS - Analisis Data dan Visualisasi.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo.jpg') }}">
    <meta property="og:url" content="https://renzho.site">
    <meta property="og:title" content="ADVIS">
    <meta property="og:description" content="Analisis Data dan Visualisasi.">
    <meta property="og:image" content="{{ asset('images/logo_litbang.jpg') }}">
    <meta property="og:image:secure_url" content="{{ asset('images/logo_litbang.jpg') }}">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="150">
    <meta property="og:image:height" content="150">



    <title>ADVIS - Analisis Data dan Visualisasi</title>

    
    <!--Dynamic StyleSheets added from a view-->
    @stack('styles')

    <!--Dynamic script added from a view-->
    @stack('scripts')

</head>

<body>

    <nav class="py-2">
        <div class="container d-flex flex-wrap">
        </div>
    </nav>

    <header class="mb-4" style="background-color: #92d18d;">
        <div class="container d-flex flex-wrap justify-content-center align-items-center">
            <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                <img class="logo" style="background-color: white;" height="70px"
                    src="{{ asset('images/advis.png') }}">
            </a>
            <div class="col-11 col-lg-9 my-1">
                <a href="{{ route('landing') }}" style="text-decoration: none; color: white;">
                    <h2 style="text-align: center; letter-spacing: 5px; color: white;">ANALISIS DATA DAN VISUALISASI</h2>
                </a>
            </div>
            <div class="col-1 col-lg-1">
                @if(auth('sanctum')->check() == 'true')
                    <a class="btn btn-default d-lg-inline-block" href="{{ route('logout') }}" style="background-color: #ffffff">Logout</a>
                @else
                    <a class="btn btn-default d-lg-inline-block" href="{{ route('login') }}" style="background-color: #ffffff">Login</a>
                @endif
            </div>
        </div>
    </header>

    <!--Dynamic content-->
    @yield('content')


    <!--Dynamic script added from a view-->
    @stack('scripts')

</body>
</html>
