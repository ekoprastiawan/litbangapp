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

    </head>

    <body>
        <table class="table display">
            <thead>
                <tr>
                    <th>Period ID</th>
                    <th>Period Name</th>
                </tr>
            </thead>
            <tbody>                
                @foreach($res1 as $res)
                <tr>
                    <td>{{$res['th_id']}}</td>
                    <td>{{$res['th']}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>

</html>
