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
                <div class="col-md-auto mx-3">
                    <div class="row">
                        <div class="card px-3 py-2 mb-3 text-white bg-secondary text-center rounded-0">
                            <a href="/bps" target="_blank" style="text-decoration: none; color: black;">
                                <h4 class="m-0">GET DATA</h4>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <a href="https://www.bps.go.id/subject/40/gender.html#subjekViewTab3" target="_blank" style="text-decoration: none; color: black;">
                            <div class="card mb-3 border-secondary border-3 text-center" style="border-radius: 15px">
                                <div class="card-body p-1">
                                    <img src="{{asset('images/icon1.png')}}" class="card-img-top" style="width: 5vw;height: 5vw;object-fit: cover;">
                                    <h6 class="m-0">Sosial dan</h6>
                                    <h6 class="m-0">Kependudukan</h6>                                    
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="row">
                        <a href="https://www.bps.go.id/subject/8/ekspor-impor.html#subjekViewTab3" target="_blank" style="text-decoration: none; color: black;">
                            <div class="card mb-3 border-secondary border-3 text-center" style="border-radius: 15px">
                                <div class="card-body p-1">
                                    <img src="{{asset('images/icon2.png')}}" class="card-img-top" style="width: 5vw;height: 5vw;object-fit: cover;">
                                    <h6 class="m-0">Ekonomi dan</h6>
                                    <h6 class="m-0">Perdagangan</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="row">
                        <a href="https://www.bps.go.id/subject/55/hortikultura.html#subjekViewTab3" target="_blank" style="text-decoration: none; color: black;">
                            <div class="card mb-3 border-secondary border-3 text-center" style="border-radius: 15px">
                                <div class="card-body p-1">
                                    <img src="{{asset('images/icon3.png')}}" class="card-img-top" style="width: 5vw;height: 5vw;object-fit: cover;">
                                    <h6 class="m-0">Pertanian dan</h6>
                                    <h6 class="m-0">Pertambangan</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col mr-3">
                    <div class="row">
                        <div class="card px-3 py-2 mb-3 text-white bg-secondary text-center rounded-0">
                            <h4 class="m-0">ANALYTIC TODAY</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card p-2 mb-3 border-secondary border-3" style="background-color: whitesmoke;border-radius: 15px">
                            <div class="row align-items-center mb-2">
                                <div class="col-7" style="color: mediumblue;">
                                    <h5>Analisis Korelasi Kapasitas Fiskal Daerah dengan Dana Perimbangan</h5>
                                </div>
                                <div class="col-5">
                                    <img src="{{asset('images/gambar1.jpg')}}" style="width: 100%;height: 8vw;object-fit: contain;">
                                </div>
                            </div>
                            <div class="row">
                                <p style="text-align:justify; line-height: 1.2;">5 Maret 2022. Dana Perimbangan dari Pemerintah Pusat kepada Pemerintah Daerah didistribusikan untuk mengurangi kesenjangan kapasitas fiskal antara Pusat dan Daerah, dan kesenjangan antar daerah. Pada sisi lain, setian Pemerintah Daerah di Indonesiao memiliki kapasitas fiskal yang berbeda. Dengan menggunakan metode uji korelasi dan analisis regresi, dilakukan penilaian apakah Dana Perimbangan akan mampu meningkatkan kapasitas fiskal daerah dan mengurangi kesenjangan.</p>
                                <div>
                                    <a href="" style="text-decoration: none; color: mediumblue; margin-right: 50px;">Read Report </a>
                                    <a href="" style="text-decoration: none; color: mediumblue;">Read Dashboard</a>
                                </div>
                            </div>
                        </div>
                        <div class="card p-2 mb-3 border-secondary border-3" style="background-color: whitesmoke;border-radius: 15px">
                            <div class="row align-items-center mb-2">
                                <div class="col-7" style="color: mediumblue;">
                                    <h5>Pengembangan Dashboard Pengawasan Program Vaksinasi COVID</h5>
                                </div>
                                <div class="col-5">
                                    <img src="{{asset('images/gambar2.jpg')}}" style="width: 100%;height: 8vw;object-fit: contain;">
                                </div>
                            </div>
                            <div class="row">
                                <p style="text-align:justify;line-height: 1.2;">10 Februari 2022. Pengawasan atas Program Vaksinasi Covid 19 akan semakin efektif jika didukung dashboad analisa data yang bekerja secara real time. Laporan ini menyajikan langkah-langkah pengembangan Dashboard Analisa Data Program Vaksinasi Covid dengan menggunakan aplikasi Power Business Intelegence.</p>
                                <div>
                                    <a href="" style="text-decoration: none; color: mediumblue; margin-right: 50px;">Read Report </a>
                                    <a href="" style="text-decoration: none; color: mediumblue;">Read Dashboard</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mx-3">
                    <div class="row">
                        <div class="card px-3 py-2 mb-3 text-white bg-secondary text-center rounded-0">
                            <h4 class="m-0">INDONESIA SUPERVISORY DATA TODAY</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card p-1 mb-3 border-secondary border-3" style="background-color: white;border-radius: 15px">
                            <div class="row">
                                <div class="col-12">
                                    <div id="container1" class="m-0" style="height: 250px; min-width: 500px; max-width: 800px; margin: 0 auto;"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div id="pie" class="m-0" style="height: 150px; min-width: 250px; max-width: 600px; margin: 0 auto;"></div>
                                </div>
                                <div class="col-6">
                                    <div id="pie2" class="m-0" style="height: 150px; min-width: 250px; max-width: 600px; margin: 0 auto;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card px-3 py-2 mb-3 text-white bg-secondary text-center rounded-0">
                            <h4 class="m-0">ASK ME</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card p-3 mb-3 border-secondary border-3" style="background-color: whitesmoke;border-radius: 15px">
                            GET DATA
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Highcharts -->

        <script src="https://code.highcharts.com/maps/highmaps.js"></script>
        <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/mapdata/countries/id/id-all.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>

        <script>

            var data1 = [
                ['id-3700', 0],
                ['id-ac', 1],
                ['id-jt', 2],
                ['id-be', 3],
                ['id-bt', 4],
                ['id-kb', 5],
                ['id-bb', 6],
                ['id-ba', 7],
                ['id-ji', 8],
                ['id-ks', 9],
                ['id-nt', 10],
                ['id-se', 11],
                ['id-kr', 12],
                ['id-ib', 13],
                ['id-su', 14],
                ['id-ri', 15],
                ['id-sw', 16],
                ['id-ku', 17],
                ['id-la', 18],
                ['id-sb', 19],
                ['id-ma', 20],
                ['id-nb', 21],
                ['id-sg', 22],
                ['id-st', 23],
                ['id-pa', 24],
                ['id-jr', 25],
                ['id-ki', 26],
                ['id-1024', 27],
                ['id-jk', 28],
                ['id-go', 29],
                ['id-yo', 30],
                ['id-sl', 31],
                ['id-sr', 32],
                ['id-ja', 33],
                ['id-kt', 34]
            ];

            // Create the chart
            Highcharts.mapChart('container1', {
                chart: {
                    map: 'countries/id/id-all'
                },

                title: {
                    text: 'Highmaps basic demo',
                    style: {
                          fontSize: '12px' 
                       } 
                },

                mapNavigation: {
                    enabled: true,
                    buttonOptions: {
                        verticalAlign: 'bottom'
                    }
                },

                colorAxis: {
                    min: 0
                },

                series: [{
                    data: data1,
                    name: 'Random data',
                    states: {
                        hover: {
                            color: '#BADA55'
                        }
                    },
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}'
                    }
                }]
            });

            Highcharts.chart('pie', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Browser market shares in January, 2018',
                    style: {
                          fontSize: '12px' 
                       } 
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: [{
                        name: 'Chrome',
                        y: 61.41,
                        sliced: true,
                        selected: true
                    }, {
                        name: 'Internet Explorer',
                        y: 11.84
                    }, {
                        name: 'Firefox',
                        y: 10.85
                    }, {
                        name: 'Edge',
                        y: 4.67
                    }, {
                        name: 'Safari',
                        y: 4.18
                    }, {
                        name: 'Sogou Explorer',
                        y: 1.64
                    }, {
                        name: 'Opera',
                        y: 1.6
                    }, {
                        name: 'QQ',
                        y: 1.2
                    }, {
                        name: 'Other',
                        y: 2.61
                    }]
                }]
            });

            Highcharts.chart('pie2', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Browser market shares in January, 2018',
                    style: {
                          fontSize: '12px' 
                       } 
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: [{
                        name: 'Chrome',
                        y: 61.41,
                        sliced: true,
                        selected: true
                    }, {
                        name: 'Internet Explorer',
                        y: 11.84
                    }, {
                        name: 'Firefox',
                        y: 10.85
                    }, {
                        name: 'Edge',
                        y: 4.67
                    }, {
                        name: 'Safari',
                        y: 4.18
                    }, {
                        name: 'Sogou Explorer',
                        y: 1.64
                    }, {
                        name: 'Opera',
                        y: 1.6
                    }, {
                        name: 'QQ',
                        y: 1.2
                    }, {
                        name: 'Other',
                        y: 2.61
                    }]
                }]
            });

        </script>
    </body>

</html>
