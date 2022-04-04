@extends('layouts.main')

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
                                <img src="{{ asset('images/icon2.png') }}" class="card-img-top"
                                    style="width: 5vw;height: 5vw;object-fit: cover;">
                                <h6 class="m-0">Private Dataset</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="row">
                    <a href="{{ route('list-data.index_kategori', ['id' => 2]) }}"
                        style="text-decoration: none; color: black;">
                        <div class="card mb-3 border-secondary border-3 text-center" style="border-radius: 15px">
                            <div class="card-body p-1">
                                <img src="{{ asset('images/icon1.png') }}" class="card-img-top"
                                    style="width: 5vw;height: 5vw;object-fit: cover;">
                                <h6 class="m-0">Public Dataset</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- <div class="row">
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
                </div> -->
                <!-- <div class="row">
                    <div class="card px-3 py-2 mb-3 border-secondary border-3"
                        style="background-color: whitesmoke;border-radius: 10px">
                        <a href="{{ route('list-data.index') }}" style="text-decoration: none; color: black;">
                            <h6 class="m-0">GET ALL DATA</h6>
                        </a>
                    </div>
                </div> -->
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
                            <div class="col-md-7" style="color: mediumblue;">
                                <a href="{{ route('analytic.detail', ['id-data' => $post->id]) }}" style="text-decoration: none; color: mediumblue; margin-right: 50px;">
                                <h5>{{$post->judul}}</h5>
                                <p style="color: black;">Oleh: {{$post->userCreate->name}}</p>
                                </a>
                            </div>
                            <div class="col-md-5">
                                <img src="/public/storage{{ ($post->img_url) }}"
                                    style="width: 100%;height: 8vw;object-fit: contain;">
                            </div>
                        </div>
                        <div class="row">
                            <p style="text-align:justify; line-height: 1.2;">{{ Carbon\Carbon::parse($post->created_at)->format('d M Y') }}. {{ \Illuminate\Support\Str::words($post->uraian, 50) }} <a href="{{ route('analytic.detail', ['id-data' => $post->id]) }}"> more</a></p>
                            <div>
                                <a href="{{ asset('storage' . $post->file_url) }}" style="text-decoration: none; color: mediumblue; margin-right: 50px;" target='_blank'>Read Report
                                </a>
                                @if($post->dashboard_url)
                                <a href="{{ $post->dashboard_url }}" target='_blank' style="text-decoration: none; color: mediumblue;">View Dashboard</a>
                                @endif
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
                                <!-- <div id="container1" class="m-0"
                                    style="height: 285px; min-width: 400px; max-width: 800px; margin: 0 auto;"></div> -->
                                <a href="#" id="pop" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <img id="imageresource" src="{{ asset('images/bali.png') }}" style="height: 285px; min-width: 400px; max-width: 800px; margin: 0 auto;">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="card p-1 mb-3 border-secondary border-3"
                        style="background-color: white;border-radius: 15px">
                        <div class="row">
                            <div class="col-12">
                                <input type="hidden" id="link_id" name="link_id" value="{{ $visual->file_url }}" readonly />
                                <input type="hidden" id="judul" name="judul" value="{{ $visual->judul }}" readonly />
                                <input type="hidden" id="label" name="label" value="{{ $visual->label }}" readonly />
                                <input type="hidden" id="tipe" name="tipe" value="{{ $visual->refJenisVisual->tipe }}" readonly />
                                <div id="container2" class="m-0"
                                    style="height: 255px; min-width: 400px; max-width: 800px; margin: 0 auto;"></div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="row">
                    <div class="card px-3 py-2 mb-3 text-white bg-secondary text-center rounded-0">
                        <h4 class="m-0">ASK ME</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="card p-0 mb-3 border-secondary border-3"
                        style="background-color: white;border-radius: 15px">
                        <a href="/askme" target='_blank' style="text-decoration: none; color: mediumblue;">
                            <div class="row justify-content-center align-items-center">
                                <div class="col-4">
                                    <img src="{{ asset('images/icon4.jpg') }}" class="rounded float-end"
                                    style="width: 5vw;height: 5vw;object-fit: cover;">
                                </div>
                                <div class="col-4">
                                    <h5>Konsultasi</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <!-- Creates the bootstrap modal where the image will appear -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <img src="{{ asset('images/bali.png') }}" id="imagepreview" style="height: 600px; min-width: 1028px; max-width: 1380px; margin: 0 auto;">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    
@endsection

@push('js1')
    <script>
        var data1 = [
            ['id-ac', 16763469972136],
            ['id-su', 13749499451958],
            ['id-sb', 6780124354738],
            ['id-ri', 9132748802329],
            ['id-ja', 4516148844341],
            ['id-sl', 10729096013693],
            ['id-be', 3052194137387],
            ['id-1024', 7480925281643],
            ['id-jk', 72967009600455],
            ['id-jr', 44615065661799],
            ['id-jt', 27190833343000],
            ['id-yo', 6091572432696],
            ['id-ji', 33008197503339],
            ['id-kb', 7035492541090],
            ['id-kt', 4889696415086],
            ['id-ks', 5526165272537],
            ['id-ki', 11616186000000],
            ['id-sw', 4087615938923],
            ['id-st', 4297164739359],
            ['id-se', 12046405712940],
            ['id-sg', 5235191610164],
            ['id-ba', 8537890262352],
            ['id-nb', 5528931855427],
            ['id-nt', 7584929735729],
            ['id-ma', 4015217740467],
            ['id-pa', 15758964362330],
            ['id-la', 3335957359387],
            ['id-bt', 15948254311169],
            ['id-bb', 3108627167849],
            ['id-go', 1912519212778],
            ['id-kr', 3986942728300],
            ['id-ib', 7744110211743],
            ['id-sr', 2062542227645],
            ['id-ku', 2364056627000]
        ];

        // Create the chart
        Highcharts.mapChart('container1', {
            chart: {
                map: 'countries/id/id-all'
            },

            title: {
                text: 'Anggaran Belanja Pemerintah Provinsi Tahun 2021',
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
                name: 'Anggaran Belanja',
                states: {
                    hover: {
                        color: '#BADA55'
                    }
                },
                dataLabels: {
                    enabled: false,
                    format: '${value:,.0f}'
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
