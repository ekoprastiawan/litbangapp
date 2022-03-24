@extends('layouts.crud')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tambah Data') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{route('visual.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="judul" class="col-md-4 col-form-label text-md-right">{{ __('Judul') }}</label>
                                <div class="col-md-6">
                                    <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{ old('judul') }}" autocomplete="judul" autofocus>
                                    @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="label" class="col-md-4 col-form-label text-md-right">{{ __('Label') }}</label>
                                <div class="col-md-6">
                                    <input id="label" type="text" class="form-control @error('label') is-invalid @enderror" name="label" value="{{ old('label') }}" autocomplete="label" autofocus>
                                    @error('label')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="file_url" class="col-md-4 col-form-label text-md-right">{{ __('File Data') }}</label>
                                <div class="col-md-6">
                                    <input id="file_url" type="file" class="form-control @error('file_url') is-invalid @enderror" name="file_url" value="{{ old('file_url') }}" autocomplete="file_url" autofocus>
                                    @error('file_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ref_jenis_visual_id" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Visualisasi') }}</label>
                                <div class="col-md-6">
                                    <select name="ref_jenis_visual_id" class="form-control @error('ref_jenis_visual_id') is-invalid @enderror" id="ref_jenis_visual_id" autocomplete="ref_jenis_visual_id" autofocus>
                                        @foreach($ref_jenis_visual as $jenis)
                                            <option value="{{$jenis->id}}" {{ old('ref_jenis_visual_id') == $jenis->id ? 'selected' : '' }}>{{$jenis->nama_jenis_visual}}</option>
                                        @endforeach
                                    </select>
                                    @error('ref_jenis_visual_id')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="pilih_visual" class="col-md-4 col-form-label text-md-right">{{ __('Tampilkan Visualisasi') }}</label>
                                <div class="col-md-6">
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="pilih_visual" id="visual1" value="1">
                                      <label class="form-check-label" for="visual1">
                                        Ya
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="pilih_visual" id="visual0" value="0" checked>
                                      <label class="form-check-label" for="visual0">
                                        Tidak
                                      </label>
                                    </div>
                                    @error('pilih_visual')
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

