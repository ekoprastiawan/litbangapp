@extends('layouts.main')
@push('styles')
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://code.highcharts.com/maps/highmaps.js"></script>
    <script src="https://code.highcharts.com/mapdata/countries/id/id-all.js"></script>
    <script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
    <script type="text/javascript" src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-auto mx-3">
                <div class="row">
                    <div class="card px-3 py-2 mb-3 text-white bg-secondary text-center rounded-0">
                        <a href="{{ route('list-data.index') }}" style="text-decoration: none; color: white;">
                            <h4 class="m-0">GET DATA</h4>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <a href="{{ route('list-data.index_kategori', ['id' => 1]) }}"
                        style="text-decoration: none; color: black;">
                        <div class="card mb-3 border-secondary border-3 text-center" style="border-radius: 15px">
                            <div class="card-body p-1">
                                <img src="{{ asset('images/icon1.png') }}" class="card-img-top"
                                    style="width: 5vw;height: 5vw;object-fit: cover;">
                                <h6 class="m-0">Sosial dan</h6>
                                <h6 class="m-0">Kependudukan</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="row">
                    <a href="{{ route('list-data.index_kategori', ['id' => 3]) }}"
                        style="text-decoration: none; color: black;">
                        <div class="card mb-3 border-secondary border-3 text-center" style="border-radius: 15px">
                            <div class="card-body p-1">
                                <img src="{{ asset('images/icon2.png') }}" class="card-img-top"
                                    style="width: 5vw;height: 5vw;object-fit: cover;">
                                <h6 class="m-0">Ekonomi dan</h6>
                                <h6 class="m-0">Perdagangan</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="row">
                    <a href="{{ route('list-data.index_kategori', ['id' => 2]) }}"
                        style="text-decoration: none; color: black;">
                        <div class="card mb-3 border-secondary border-3 text-center" style="border-radius: 15px">
                            <div class="card-body p-1">
                                <img src="{{ asset('images/icon3.png') }}" class="card-img-top"
                                    style="width: 5vw;height: 5vw;object-fit: cover;">
                                <h6 class="m-0">Pertanian dan</h6>
                                <h6 class="m-0">Pertambangan</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="row">
                    <div class="card px-3 py-2 mb-3 border-secondary border-3"
                        style="background-color: whitesmoke;border-radius: 10px">
                        <a href="{{ route('list-data.index') }}" style="text-decoration: none; color: black;">
                            <h6 class="m-0">GET ALL DATA</h6>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col mr-3">
                <div class="row">
                    <div class="card px-3 py-2 mb-3 text-white bg-secondary text-center rounded-0">
                        <a href="{{ route('analytic.index') }}" style="text-decoration: none; color: white;">
                            <h4 class="m-0">ANALYTIC TODAY</h4>
                        </a>
                    </div>
                </div>

                <div class="row">
                    @foreach($analytic as $post)
                    <div class="card p-2 mb-3 border-secondary border-3"
                        style="background-color: whitesmoke;border-radius: 15px">
                        <div class="row align-items-center mb-2">
                            <div class="col-7" style="color: mediumblue;">
                                <a href="{{ route('analytic.detail', ['id-data' => $post->id]) }}" style="text-decoration: none; color: mediumblue; margin-right: 50px;">
                                <h5>{{$post->judul}}</h5>
                                </a>
                            </div>
                            <div class="col-5">
                                <img src="/public/storage{{ ($post->img_url) }}"
                                    style="width: 100%;height: 8vw;object-fit: contain;">
                            </div>
                        </div>
                        <div class="row">
                            <p style="text-align:justify; line-height: 1.2;">{{ Carbon\Carbon::parse($post->created_at)->format('d M Y') }}. {{ \Illuminate\Support\Str::words($post->uraian, 50) }}</p>
                            <div>
                                <a href="{{ asset('storage' . $post->file_url) }}" style="text-decoration: none; color: mediumblue; margin-right: 50px;" target='_blank'>Read Report
                                </a>
                                <a href="{{ $post->dashboard_url }}" target='_blank' style="text-decoration: none; color: mediumblue;">View Dashboard</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="card align-items-center px-3 py-2 mb-3 border-secondary border-3"
                        style="background-color: whitesmoke;border-radius: 15px">
                        <a href="{{ route('analytic.index') }}" style="text-decoration: none; color: black;">
                            <h6 class="m-0"> ALL POSTS </h6>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 mx-3">
                <div class="row">
                    <div class="card px-3 py-2 mb-3 text-white bg-secondary text-center rounded-0">
                        <a href="{{ route('visual.index') }}" style="text-decoration: none; color: white;">
                            <h4 class="m-0">INDONESIA SUPERVISORY DATA TODAY</h4>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="card p-1 mb-3 border-secondary border-3"
                        style="background-color: white;border-radius: 15px">
                        <div class="row">
                            <div class="col-12">
                                <div id="container1" class="m-0"
                                    style="height: 285px; min-width: 500px; max-width: 800px; margin: 0 auto;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card p-1 mb-3 border-secondary border-3"
                        style="background-color: white;border-radius: 15px">
                        <div class="row">
                            <div class="col-12">
                                <input type="hidden" id="link_id" name="link_id" value="{{ $visual->file_url }}" readonly />
                                <input type="hidden" id="judul" name="judul" value="{{ $visual->judul }}" readonly />
                                <input type="hidden" id="label" name="label" value="{{ $visual->label }}" readonly />
                                <input type="hidden" id="tipe" name="tipe" value="{{ $visual->refJenisVisual->tipe }}" readonly />
                                <div id="container2" class="m-0"
                                    style="height: 255px; min-width: 500px; max-width: 800px; margin: 0 auto;"></div>
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
                    <div class="card p-3 mb-3 border-secondary border-3"
                        style="background-color: whitesmoke;border-radius: 15px">
                        Under Construction
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

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
                text: 'Contoh Visualisasi',
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
                    enabled: false,
                    format: '{point.name}'
                }
            }]
        });

        $(document).ready(function() {

            var link = document.getElementById("link_id").value;
            var judul = document.getElementById("judul").value;
            var label = document.getElementById("label").value;
            var tipe = document.getElementById("tipe").value;
            var URL = window.location.origin;


            Highcharts.chart('container2', {
                chart: {
                    type: tipe
                },
                data: {

                    csvURL: URL + '/storage' + link
                },
                title: {
                    text: judul
                },
                yAxis: {
                    title: {
                        text: label
                    }
                }
            });
          
        });
    </script>
@endpush
