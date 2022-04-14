@extends('layouts.crud')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Data') }}</div>
                    <div class="card-body">
                        @include("layouts.notification")
                        <form method="POST" enctype="multipart/form-data" action="{{ route('visual.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $visual->id }}"/>
                            <div class="form-group row mb-3">
                                <label for="judul" class="col-md-4 col-form-label text-md-end">{{ __('Judul *') }}</label>
                                <div class="col-md-6">
                                    <input id="judul" type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{$visual->judul}}" autocomplete="judul" autofocus>
                                    @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="file_url" class="col-md-4 col-form-label text-md-end">{{ __('Embed URL') }}</label>
                                <div class="col-md-6">
                                    <input id="file_url" type="text" class="form-control @error('file_url') is-invalid @enderror" name="file_url" value="{{$visual->file_url}}" autocomplete="file_url" autofocus>
                                    @error('file_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="pilih_visual" class="col-md-4 col-form-label text-md-end">{{ __('Tampilkan Visualisasi *') }}</label>
                                <div class="col-md-6">
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="pilih_visual" id="visual1" value="1" {{($visual->pilih_visual == 1) ? 'checked' : ''}}>
                                      <label class="form-check-label" for="visual1">
                                        Ya
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="radio" name="pilih_visual" id="visual0" value="0" {{($visual->pilih_visual == 0) ? 'checked' : ''}}>
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

@push('js1')
    <script>
        $(document).ready(function (){
            $("#ref_jenis_visual_id").select2({theme: 'bootstrap-5'});
            
        });
    </script>
@endpush