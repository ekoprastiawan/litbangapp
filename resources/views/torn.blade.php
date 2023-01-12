<!DOCTYPE html>
<html lang="en">

    <!--#######################################################################################################
     * @application   <Data Analytic Workshop>
     * @author    Eko Rosdiansa Prastiawan
     * @department   BPKP RI <Financial and Development Supervisory Board> / Badan Pengawasan Keuangan dan Pembangunan
     * @version     1.0
     * @copyright    Puslitbangwas BPKP © 2022
     * @Framework  PHP Laravel Framework 8.83
    ############################################################################################################-->

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="description" content="Aplikasi Data Analytic Workshop.">
        <meta name="author" content="Eko Rosdiansa Prastiawan">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo.jpg')}}">
        <meta property="og:url" content="https://renzho.site">
        <meta property="og:title" content="Data Analytic Workshop">
        <meta property="og:description" content="Aplikasi Data Analytic Workshop.">
        <meta property="og:image" content="{{asset('images/logo_litbang.jpg')}}">
        <meta property="og:image:secure_url" content="{{asset('images/logo_litbang.jpg')}}">
        <meta property="og:image:type" content="image/jpeg">
        <meta property="og:image:width" content="150">
        <meta property="og:image:height" content="150">

        <title>Data Analytic Workshop</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- DataTables CSS -->
        <link href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet" crossorigin="anonymous">

        <!-- Select2 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css" rel="stylesheet" />

    </head>

    <body>

        <table  id="datapost" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Energy</th>
                    <th style="text-align: right;" >Market Value</th>
                    <th style="text-align: right;" >Bazaar Value</th>
                    <th style="text-align: right;" >Discount</th>
                    <th style="text-align: right;" >Price / E</th>
                </tr>
            </thead>
            <tbody>                
                @foreach($torn as $dat)
                <tr>
                    <td>{{$dat->id}}</td>
                    <td>{{$dat->name}}</td>
                    <td>{{$dat->energy}}</td>
                    <td style="text-align: right;" >{{number_format($dat->market_value)}}</td>
                    <td style="text-align: right;" >{{number_format($dat->low_value)}}</td>
                    <td style="text-align: right;" >{{number_format(($dat->market_value - $dat->low_value) / $dat->market_value * 100,2)}}</td>
                    <td style="text-align: right;" >{{number_format($dat->low_value / $dat->energy)}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


    <!-- jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" crossorigin="anonymous"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#datapost').DataTable({"order": [[ 6, "asc" ]]});
        });
    </script>
    </body>

</html>
