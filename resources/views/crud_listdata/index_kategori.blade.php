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
        <meta name="author" content="Eko Rosdiansa Prastiawan">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo.jpg')}}">
        <meta property="og:url" content="https://renzho.site">
        <meta property="og:title" content="ADVIS">
        <meta property="og:description" content="Analisis Data dan Visualisasi.">
        <meta property="og:image" content="{{asset('images/logo_litbang.jpg')}}">
        <meta property="og:image:secure_url" content="{{asset('images/logo_litbang.jpg')}}">
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:width" content="150">
        <meta property="og:image:height" content="150">

        <title>ADVIS - Analisis Data dan Visualisasi</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"/>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css"/>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    </head>

    <body>

        <nav class="py-2">
            <div class="container d-flex flex-wrap">
            </div>
        </nav>

        <header class="mb-4" style="background-color: #92d18d;">
            <div class="container d-flex flex-wrap justify-content-center align-items-center">
                <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
                    <img class="logo"  style="background-color: white;" height="55px" src="{{asset('images/logo2.png')}}">
                </a>
                <div class="col-11 col-lg-9 my-1">
                    <h2 style="text-align: center; letter-spacing: 5px; color: white;">DATA ANALYTIC WORKSHOP</h2>
                </div>
                <div class="col-1 col-lg-1">
                    <a class="btn btn-secondary d-lg-inline-block" href="{{ route('login') }}">Login</a>
                </div>
            </div>
        </header>

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header align-items-center justify-content-between">
                            <center><h5 class="m-0 font-weight-bold text-primary">List Data</h5></center>
                        </div>
                        <div class="card-body" style="padding: 4rem;">
                            <div class="col-sm-12">
                                @if(session()->get('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                            </div>
                            <div class="d-flex flex-row-reverse">
                                <a style="margin-bottom: 1em;" href="{{ route('list-data.create') }}" class="btn btn-primary btn-sm pull-right">Tambah Post</a>
                            </div>
                            <table id="datapost" class="table table-striped table-bordered" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Sub Kategori</th>
                                    <th>Nama File</th>
                                    <th>Sumber Data</th>
                                    <th>Link</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($dataList as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$data->nama_kategori}}</td>
                                        <td>{{$data->nama_sub_kategori}}</td>
                                        <td>{{$data->nama_data}}</td>
                                        <td>{{$data->nama_sumber_data}}</td>
                                        <td><a href="{{$data->url_data}}" target="_blank"><i class="fa fa-download"></i> Download</a></td>
                                        <td>
                                            <a href="{{ route('list-data.edit',['id-data'=>$data->id])}}" class="btn btn-primary">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function() {
                $('#datapost').DataTable();
            } );
        </script>

    </body>
</html>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
