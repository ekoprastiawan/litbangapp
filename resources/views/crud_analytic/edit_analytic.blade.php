@extends('layouts.crud')
@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('Edit Data') }}</div>
                    <div class="card-body">
                        @include("layouts.notification")
                        <form method="POST" enctype="multipart/form-data" action="{{ route('analytic.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $analytic->id }}"/>
                            <div class="form-group row">
                                <label for="judul" class="col-md-3 col-form-label text-md-right">{{ __('Judul') }}</label>
                                <div class="col-md-7">
                                    <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{$analytic->judul}}" autocomplete="judul" autofocus>
                                    @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="uraian" class="col-md-3 col-form-label text-md-right">{{ __('Uraian') }}</label>
                                <div class="col-md-7">
                                    <textarea id="uraian" class="form-control @error('uraian') is-invalid @enderror" name="uraian"  rows="6" autofocus>{{$analytic->uraian}}
                                    </textarea>
                                    @error('uraian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="img_existing" class="col-md-3 col-form-label text-md-right">{{ __('Gambar Lama')}}</label>
                                <div class="col-md-7">
                                    <span><img src='{{asset('storage'.$analytic->img_url)}}' width="300"></span>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="img_url" class="col-md-3 col-form-label text-md-right">{{ __('Gambar Baru') }}</label>
                                <div class="col-md-7">
                                    <input id="img_url" type="file" class="form-control @error('img_url') is-invalid @enderror" name="img_url" value="{{ old('img_url') }}" autocomplete="img_url" autofocus>
                                    @error('img_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="file_existing" class="col-md-3 col-form-label text-md-right">{{ __('File Lama')}}</label>
                                <div class="col-md-7">
                                    <span><a href='{{asset('storage'.$analytic->file_url)}}' target='_blank'>Link File</a></span>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="file_url" class="col-md-3 col-form-label text-md-right">{{ __('File Baru') }}</label>
                                <div class="col-md-7">
                                    <input id="file_url" type="file" class="form-control @error('file_url') is-invalid @enderror" name="file_url" value="{{ old('file_url') }}" autocomplete="file_url" autofocus>
                                    @error('file_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dashboard_url"
                                    class="col-md-3 col-form-label text-md-right">{{ __('Link Dashboard') }}</label>
                                <div class="col-md-7">
                                    <input id="dashboard_url" type="text"
                                        class="form-control @error('dashboard_url') is-invalid @enderror" name="dashboard_url"
                                        value="{{$analytic->dashboard_url}}" autocomplete="dashboard_url" autofocus>
                                    @error('dashboard_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-7 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Simpan') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
