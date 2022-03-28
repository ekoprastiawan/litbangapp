@extends('layouts.main')

@section('content')
<div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container">
                    <h3>{{$analytic->judul}}</h3>
                    <p>Oleh: {{$analytic->userCreate->name}}</p>
                    <p>{{ Carbon\Carbon::parse($analytic->created_at)->format('d M Y') }}</p>
                    <p>{{$analytic->uraian}}</p>
                    <p><a href='{{ asset('storage' . $analytic->file_url) }}'
                                                target='_blank'>Read Report</a></p>
                   <p> <a href="{{ $analytic->dashboard_url }}" target="_blank"><i
                                                    class="fa fa-download"></i> View Dashboard</a></p>
                </div>
            </div>
        </div>
    </div>


@endsection