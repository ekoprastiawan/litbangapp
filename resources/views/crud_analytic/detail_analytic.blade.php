@extends('layouts.main')

@section('content')
<div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container">
                    <div class="card mb-3" style="max-width: 1280px;">
                        <div class="row g-0">
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h3>{{$analytic->judul}}</h3>
                                    <p>Oleh: {{$analytic->userCreate->name}}</p>
                                    <p>{{ Carbon\Carbon::parse($analytic->created_at)->format('d M Y') }}</p>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card-body">
                                    <img src="/public/storage{{$analytic->img_url}}" class="img-fluid rounded-start">
                                </div>
                            </div>                            
                        </div>
                        <div class="row g-0">
                            <div class="col-md-12">
                                <div class="card-body">
                                    <p style="text-align:justify">{{$analytic->uraian}}</p>
                                    <p>
                                        <a href='{{ asset('storage' . $analytic->file_url) }}' target='_blank'>Read Report</a>
                                    </p>
                                    @if($analytic->dashboard_url)
                                    <p> 
                                        <a href="{{ $analytic->dashboard_url }}" target="_blank"><i class="fa fa-download"></i> View Dashboard</a>
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(Auth::check() && (Auth::guard('web')->user()->role_id == '2' || Auth::guard('web')->user()->role_id == '3' || (Auth::guard('web')->user()->role_id == '1' && $analytic->created_by == Auth::guard('web')->user()->niplama)))
                    <a href="{{ route('analytic.edit', ['id-data' => $analytic->id]) }}"
                        class="btn btn-primary">Edit</a>
                    @endif
                </div>
            </div>
        </div>
    </div>


@endsection