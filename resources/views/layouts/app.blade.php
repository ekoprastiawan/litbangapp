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
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>ADVIS - Analisis Data dan Visualisasi</title>

        


        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @livewireStyles

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <nav class="py-2">
            <div class="container d-flex flex-wrap">
            </div>
        </nav>

        <header class="mb-4" style="background-color: #92d18d;">
            <div class="container d-flex flex-wrap justify-content-between align-items-center">
                <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                    <img class="logo" style="background-color: white; width: 100%;height: 5vw;object-fit: contain;" 
                        src="{{ asset('images/advis.png') }}">
                </a>
                <div class="col-xs-11 col-lg-9 my-1">
                    <a href="{{ route('landing') }}" style="text-decoration: none; color: white;">
                        <h2 style="text-align: center; letter-spacing: 5px; color: white;">ANALISIS DATA DAN VISUALISASI</h2>
                    </a>
                </div>
                <div class="ml-3 relative">
                    @if(auth('sanctum')->check() == 'true')
                        <!-- <a class="btn btn-default d-lg-inline-block" href="{{ route('logout') }}" style="background-color: #ffffff">Logout</a> -->
                        <button class="btn btn-default d-lg-inline-block" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="background-color: #ffffff">{{Auth::user()->name}}</button>

                        <div class="offcanvas offcanvas-end w-auto" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                          <div class="offcanvas-header">
                            <h5 id="offcanvasRightLabel"></h5>
                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                          </div>
                          <div class="offcanvas-body">
                            <div class="list-group">
                              <a href="{{ route('profile.show') }}" class="list-group-item list-group-item-action">
                                {{ __('Ubah Profil') }}
                              </a>

                              @if(Auth::user()->role_id == '2' || Auth::user()->role_id == '3' )

                              <a href="#" class="list-group-item list-group-item-action" id="dropdownMenuButton" data-bs-toggle="dropdown">Tambah/Ubah Referensi</a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item" href="#">Kategori</a></li>
                                        <li><a class="dropdown-item" href="#">Sub Kategori</a></li>
                                        <li><a class="dropdown-item" href="#">Sumber Data</a></li>
                                    </ul>

                              @endif

                              @if(Auth::user()->role_id == '3' )
                              <a href="#" class="list-group-item list-group-item-action">User Role Management</a>
                              @endif

                              <a href="{{ route('logout') }}" class="list-group-item list-group-item-action" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();"><i class="icon ion-forward"></i> Logout</a>
                                <form action="{{ route('logout') }}" method="post" id="logoutForm" style="display:none">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                          </div>
                        </div>
                    @else
                        <a class="btn btn-default d-lg-inline-block" href="{{ route('login') }}" style="background-color: #ffffff">Login</a>
                    @endif
                </div>
            </div>
        </header>

        <div class="min-h-screen bg-gray-100">

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        @livewireScripts
    </body>
</html>
