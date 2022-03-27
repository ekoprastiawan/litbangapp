@extends('layouts.main')

@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header align-items-center justify-content-between">
                            <center><h5 class="m-0 font-weight-bold text-primary">List Data</h5></center>
                        </div>
                        <div class="card-body" style="padding: 4rem;">
                            <div class="col-sm-12">
                                @if(session()->get('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group row mb-2">
                                <label for="ref_kategori_id" class="col-md-4 col-form-label text-md-end">{{ __('Kategori *') }}</label>
                                <div class="col-md-6">
                                    <select name="ref_kategori_id" class="form-select" id="ref_kategori_id" autocomplete="ref_kategori_id" autofocus data-placeholder="--Pilih Kategori--">
                                        <option value="">--Pilih Kategori--</option>
                                        @foreach($ref_kategories as $kategori)
                                            <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                                        @endforeach
                                    </select>
                                    @error('ref_kategori_id')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label for="ref_sub_kategori_id" class="col-md-4 col-form-label text-md-end">{{ __('Sub Kategori *') }}</label>
                                <div class="col-md-6">
                                    <select name="ref_sub_kategori_id" class="form-control @error('ref_sub_kategori_id') is-invalid @enderror" id="ref_sub_kategori_id" autocomplete="ref_sub_kategori_id" autofocus data-placeholder="--Pilih Sub Kategori--">
                                        <option value="">{{'--Pilih Sub Kategori--'}}</option>
                                    </select>
                                    @error('ref_sub_kategori_id')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::guard('web')->user()->role_id == '2'
                                || \Illuminate\Support\Facades\Auth::guard('web')->user()->role_id == '3')
                                <div class="d-flex flex-row-reverse">
                                    <a style="margin-bottom: 1em;" href="{{ route('list-data.create') }}" class="btn btn-primary btn-sm pull-right">Tambah Post</a>
                                </div>
                            @endif
                            <div class="table-responsive-lg">
                                {{ csrf_field() }}
                            <table id="datapost" class="display" style="width: 100%">
                                <thead>
                                <tr>
                                    <th style="text-align: center;" width="5%">No</th>
                                    <th style="text-align: center;">Kategori</th>
                                    <th style="text-align: center;">Sub Kategori</th>
                                    <th style="text-align: center;">Nama File</th>
                                    <th style="text-align: center;">Sumber Data</th>
                                    <th style="text-align: center;">Link</th>
                                    @if(\Illuminate\Support\Facades\Auth::guard('web')->user()->role_id == '2'
                                        || \Illuminate\Support\Facades\Auth::guard('web')->user()->role_id == '3')
                                        <th></th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($dataList as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$data->refSubKategori->refKategori->nama_kategori}}</td>
                                        <td>{{$data->refSubKategori->nama_sub_kategori}}</td>
                                        <td>{{$data->nama_data}}</td>
                                        <td>{{$data->refSumberData->nama_sumber_data}}</td>
                                        <td><a href="{{$data->url_data}}" target="_blank"><i class="fa fa-download"></i> Download</a></td>
                                        @if(\Illuminate\Support\Facades\Auth::guard('web')->user()->role_id == '2'
                                            || \Illuminate\Support\Facades\Auth::guard('web')->user()->role_id == '3')
                                            <td>
                                                <a href="{{ route('list-data.edit',['id-data'=>$data->id])}}" class="btn btn-primary">Edit</a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('js1')

    <script>
        var URL = window.location.origin;
        $(document).ready(function() {
            $('#datapost').DataTable();
            $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

            $("#ref_kategori_id").select2( {
                theme: "bootstrap-5",
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder: $( this ).data( 'placeholder' ),
                allowClear: true
            } );

            $("#ref_sub_kategori_id").select2( {
                theme: "bootstrap-5",
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder: $( this ).data( 'placeholder' ),
                allowClear: true
            } );

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

        } );
    </script>

@endpush