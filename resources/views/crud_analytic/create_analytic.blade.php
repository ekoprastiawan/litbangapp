@extends('layouts.crud')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tambah Data') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('analytic.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="judul" class="col-md-4 col-form-label text-md-right">{{ __('Judul') }}</label>
                                <div class="col-md-6">
                                    <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror"
                                        name="judul" value="{{ old('judul') }}" autocomplete="judul" autofocus>
                                    @error('judul')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Uraian"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Uraian') }}</label>
                                <div class="col-md-6">
                                    <textarea id="uraian" class="form-control @error('uraian') is-invalid @enderror" name="uraian" autofocus></textarea>
                                    @error('uraian')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="img_url"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Upload Gambar') }}</label>
                                <div class="col-md-6">
                                    <input id="img_url" type="file"
                                        class="form-control @error('img_url') is-invalid @enderror" name="img_url"
                                        value="{{ old('img_url') }}" autocomplete="img_url" autofocus>
                                    @error('img_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="file_url"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Upload File') }}</label>
                                <div class="col-md-6">
                                    <input id="file_url" type="file"
                                        class="form-control @error('file_url') is-invalid @enderror" name="file_url"
                                        value="{{ old('file_url') }}" autocomplete="file_url" autofocus>
                                    @error('file_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dashboard_url"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Link Dashboard') }}</label>
                                <div class="col-md-6">
                                    <input id="dashboard_url" type="text"
                                        class="form-control @error('dashboard_url') is-invalid @enderror" name="dashboard_url"
                                        value="{{ old('dashboard_url') }}" autocomplete="dashboard_url" autofocus>
                                    @error('dashboard_url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
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
