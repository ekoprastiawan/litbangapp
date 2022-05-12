@extends('layouts.crud')

@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Data') }}</div>
                    <div class="card-body">
                        @include("layouts.notification")
                        <form method="POST" action="{{ route('list-data.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $dataList->id }}"/>
                            <div class="form-group row mb-3">
                                <label for="ref_kategori_id" class="col-md-4 col-form-label text-md-end">{{ __('Kategori *') }}</label>
                                <div class="col-md-6">
                                    <select name="ref_kategori_id" class="form-control @error('ref_kategori_id') is-invalid @enderror" id="ref_kategori_id" autocomplete="ref_kategori_id" autofocus>
                                        <option value="">{{'--Pilih Kategori--'}}</option>
                                        @foreach($listKategori as $kategori)
                                            <option value="{{$kategori->id}}" @if($kategori->id === $dataList->refSubKategori->refKategori->id) selected @endif>{{$kategori->nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                    @error('ref_kategori_id')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="ref_sub_kategori_id" class="col-md-4 col-form-label text-md-end">{{ __('Sub Kategori *') }}</label>
                                <div class="col-md-6">
                                    <select name="ref_sub_kategori_id" class="form-control @error('ref_sub_kategori_id') is-invalid @enderror" id="ref_sub_kategori_id" autocomplete="ref_sub_kategori_id" autofocus>
                                        <option value="">{{'--Pilih Sub Kategori--'}}</option>
                                        @foreach($listSubKategori as $subkategori)
                                            <option value="{{$subkategori->id}}" @if($subkategori->id === $dataList->refSubKategori->id) selected @endif>{{$subkategori->nama_sub_kategori}}</option>
                                        @endforeach
                                    </select>
                                    @error('ref_sub_kategori_id')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="nama_data" class="col-md-4 col-form-label text-md-end">{{ __('Nama Data *') }}</label>
                                <div class="col-md-6">
                                    <input id="nama_data" type="text" class="form-control @error('nama_file') is-invalid @enderror" name="nama_data" value="{{$dataList->nama_data}}" autocomplete="nama_file" autofocus>
                                    @error('nama_file')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="nama_sumber_data" class="col-md-4 col-form-label text-md-end">{{ __('Sumber Data *') }}</label>
                                <div class="col-md-6">
                                    <select name="ref_sumber_data_id" class="form-control" id="ref_sumber_data_id" autofocus>
                                        @foreach($listSumberData as $sumberData)
                                            <option value="{{$sumberData->id}}" @if($sumberData->id === $dataList2->refSumberData->id) selected @endif>{{$sumberData->nama_sumber_data}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label for="url_data" class="col-md-4 col-form-label text-md-end">{{ __('Link File *') }}</label>
                                <div class="col-md-6">
                                    <input id="url_data" type="text" class="form-control @error('url_data') is-invalid @enderror" name="url_data" value="{{$dataList->url_data}}" autocomplete="url_data">
                                    @error('url_data')
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
            $("#ref_kategori_id").select2({theme: 'bootstrap-5'});
            $("#ref_sub_kategori_id").select2({theme: 'bootstrap-5'});
            $("#ref_sumber_data_id").select2({theme: 'bootstrap-5'});
            $("#ref_kategori_id").on("change",function (){
                $.ajax({
                    url: URL+'/async-req/get-sub-kategori',
                    method: "GET",
                    data:{
                        "id-kategori": $(this).val()
                    },
                    success: function (response){
                        $("#ref_sub_kategori_id").html('<option>--- Pilih Sub Kategori ---</option>');
                        $.each(response, function (key, value){
                            $("#ref_sub_kategori_id").append("<option value='"+value.id+"'>"+value.nama_sub_kategori+"</option>")
                        });
                    }
                });
            });
        });
    </script>
@endpush
