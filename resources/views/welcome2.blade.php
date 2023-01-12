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
                                <h6 class="m-0">Data Internal</h6>
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
                                <h6 class="m-0">Data Eksternal</h6>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="row">
                    <a href="{{ route('list-data.index_kategori', ['id' => 3]) }}"
                        style="text-decoration: none; color: black;">
                        <div class="card mb-3 border-secondary border-3 text-center" style="border-radius: 15px">
                            <div class="card-body p-1">
                                <img src="{{ asset('images/icon5.png') }}" class="card-img-top"
                                    style="width: 5vw;height: 5vw;object-fit: cover;">
                                <h6 class="m-0">Dataset</h6>
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
                                @if(!empty($post->userCreate->name))
                                <p style="color: black;">Oleh: {{$post->userCreate->name}}</p>
                                @endif
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
                        <a href="{{ route('visual.index2') }}" style="text-decoration: none; color: white;">
                            <h4 class="m-0">INDONESIA SUPERVISORY DATA TODAY</h4>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="card p-1 mb-3 border-secondary border-3"
                        style="background-color: white;border-radius: 15px">
                        <div class="row">
                            <div class="col-12">
                                <iframe src="{{$visual->file_url}}" frameborder="0" style="border:0; min-height: 48vh; width: 100%;" allowfullscreen></iframe>
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
    
@endsection


