@extends('layouts.main')

@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header align-items-center justify-content-between">
                            <center><h5 class="m-0 font-weight-bold text-primary">Visualisasi Data</h5></center>
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
                                <a style="margin-bottom: 1em;" href="{{ route('visual.index2') }}" class="btn btn-primary btn-sm pull-right">Tambah Data</a>
                            </div>

                            {{$count}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
