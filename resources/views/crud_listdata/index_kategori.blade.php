@extends('layouts.main')

@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header align-items-center justify-content-between">
                            <center><h5 class="m-0 font-weight-bold text-primary">List {{$dataKategori->nama_kategori}}</h5></center>
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
                                <label for="ref_sub_kategori_id" class="col-md-4 col-form-label text-md-end">{{ __('Sub Kategori *') }}</label>
                                <div class="col-md-6">
                                    <select name="ref_sub_kategori_id" class="form-control @error('ref_sub_kategori_id') is-invalid @enderror" id="ref_sub_kategori_id" autocomplete="ref_sub_kategori_id" autofocus data-placeholder="--Pilih Sub Kategori--">
                                        <option value="">{{'--Pilih Kategori--'}}</option>
                                        @foreach($dataSubKategori as $kategori)
                                            <option value="{{$kategori->id}}">{{$kategori->nama_sub_kategori}}</option>
                                        @endforeach
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
                                <input type="hidden" name="id_kategori" id="id_kategori" value="{{ $dataKategori->id }}"/>
                            <table id="datapost" class="display" style="width: 100%">
                                <thead>
                                <tr>
                                    <th style="text-align: center;" width="5%">No</th>
                                    <th style="text-align: center;" width="15%">Kategori</th>
                                    <th style="text-align: center;" width="15%">Sub Kategori</th>
                                    <th style="text-align: center;">Nama Data</th>
                                    <th style="text-align: center;" width="15%">Sumber Data</th>
                                    <th style="text-align: center;" width="6%">Link</th>
                                    @if(Auth::guard('web')->user()->role_id == '2' || Auth::guard('web')->user()->role_id == '3')
                                        <th></th>
                                    @endif
                                </tr>
                                </thead>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('js1')
@if(Auth::guard('web')->user()->role_id == '2' || Auth::guard('web')->user()->role_id == '3')
    <script>
        var URL = window.location.origin;
        $(document).ready(function() {
            $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

            $("#ref_sub_kategori_id").select2( {
                theme: "bootstrap-5",
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder: $( this ).data( 'placeholder' ),
                allowClear: true
            } );

            $.ajax({
                  url: URL+'/async-req/get-list-data',
                  type: 'get',
                  dataType: 'json',
                  data:{
                        "id-kategori": $('#id_kategori').val()
                    },
                  success:function(data) {
                    console.log(data);
                    var t = $('#datapost').DataTable({
                        "bDestroy": true, 
                        bJQueryUI: true,
                        aaData: data,
                        aoColumns: [
                            { mData: 'id' ,"fnRender": function( oObj ) { return oObj.aData[3].id }},
                            { mData: 'ref_sub_kategori.ref_kategori.nama_kategori' ,"fnRender": function( oObj ) { return oObj.aData[5].ref_sub_kategori.ref_kategori.nama_kategori }},
                            { mData: 'ref_sub_kategori.nama_sub_kategori' ,"fnRender": function( oObj ) { return oObj.aData[3].ref_sub_kategori.nama_sub_kategori }},
                            { mData: 'nama_data' ,"fnRender": function( oObj ) { return oObj.aData[3].nama_data }},                    
                            { mData: 'ref_sumber_data.nama_sumber_data' ,"fnRender": function( oObj ) { return oObj.aData[3].ref_sumber_data.nama_sumber_data }},
                            { mData: 'url_data',"mRender": function(data, type, full) {
                              return '<a href="' + data + '" target="_blank"><i class="fa fa-download"></i> Download</a>';
                            }},
                            { mData: 'id',"mRender": function(data, type, full) {
                              return '<a href="/list-data/edit?id-data='+ data +'" class="btn btn-primary">Edit</a>';
                            }}
                                  ]

                    });

                    t.on( 'order.dt search.dt', function () {
                        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                            cell.innerHTML = i+1;
                        });
                    }).draw();

                 }     
              });

            $("#ref_sub_kategori_id").on("change",function (){
                $.ajax({
                    url: URL+'/async-req/get-list-data',
                    type: 'get',
                    dataType: 'json',
                    data:{
                        "id-kategori": $('#id_kategori').val(),
                        "id-sub-kategori": $(this).val()
                    },
                    success:function(data) {
                        console.log(data);
                        var t = $('#datapost').DataTable({
                            "bDestroy": true, 
                            bJQueryUI: true,
                            aaData: data,
                            aoColumns: [
                                { mData: 'id' ,"fnRender": function( oObj ) { return oObj.aData[3].id }},
                                { mData: 'ref_sub_kategori.ref_kategori.nama_kategori' ,"fnRender": function( oObj ) { return oObj.aData[5].ref_sub_kategori.ref_kategori.nama_kategori }},
                                { mData: 'ref_sub_kategori.nama_sub_kategori' ,"fnRender": function( oObj ) { return oObj.aData[3].ref_sub_kategori.nama_sub_kategori }},
                                { mData: 'nama_data' ,"fnRender": function( oObj ) { return oObj.aData[3].nama_data }},                    
                                { mData: 'ref_sumber_data.nama_sumber_data' ,"fnRender": function( oObj ) { return oObj.aData[3].ref_sumber_data.nama_sumber_data }},
                                { mData: 'url_data',"mRender": function(data, type, full) {
                                  return '<a href="' + data + '" target="_blank"><i class="fa fa-download"></i> Download</a>';
                                }},
                                { mData: 'id',"mRender": function(data, type, full) {
                                  return '<a href="/list-data/edit?id-data='+ data +'" class="btn btn-primary">Edit</a>';
                                }}
                                      ]

                        });

                        t.on( 'order.dt search.dt', function () {
                            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                                cell.innerHTML = i+1;
                            });
                        }).draw();

                     }
                });
            });

        } );
    </script>
@else
    <script>
        var URL = window.location.origin;
        $(document).ready(function() {
            $('#datapost').DataTable();
            $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

            $("#ref_sub_kategori_id").select2( {
                theme: "bootstrap-5",
                width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
                placeholder: $( this ).data( 'placeholder' ),
                allowClear: true
            } );

            $.ajax({
                  url: URL+'/async-req/get-list-data',
                  type: 'get',
                  dataType: 'json',
                  data:{
                        "id-kategori": $('#id_kategori').val(),
                        "id-sub-kategori": $(this).val()
                    },
                  success:function(data) {
                    console.log(data);
                    var t = $('#datapost').DataTable({
                        "bDestroy": true, 
                        bJQueryUI: true,
                        aaData: data,
                        aoColumns: [
                            { mData: 'id' ,"fnRender": function( oObj ) { return oObj.aData[3].id }},
                            { mData: 'ref_sub_kategori.ref_kategori.nama_kategori' ,"fnRender": function( oObj ) { return oObj.aData[5].ref_sub_kategori.ref_kategori.nama_kategori }},
                            { mData: 'ref_sub_kategori.nama_sub_kategori' ,"fnRender": function( oObj ) { return oObj.aData[3].ref_sub_kategori.nama_sub_kategori }},
                            { mData: 'nama_data' ,"fnRender": function( oObj ) { return oObj.aData[3].nama_data }},                    
                            { mData: 'ref_sumber_data.nama_sumber_data' ,"fnRender": function( oObj ) { return oObj.aData[3].ref_sumber_data.nama_sumber_data }},
                            { mData: 'url_data',"mRender": function(data, type, full) {
                              return '<a href="' + data + '" target="_blank"><i class="fa fa-download"></i> Download</a>';
                            }}
                                  ]

                    });

                    t.on( 'order.dt search.dt', function () {
                        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                            cell.innerHTML = i+1;
                        });
                    }).draw();

                 }     
              });

            $("#ref_sub_kategori_id").on("change",function (){
                $.ajax({
                    url: URL+'/async-req/get-list-data',
                    type: 'get',
                    dataType: 'json',
                    data:{
                        "id-kategori": $('#id_kategori').val(),
                        "id-sub-kategori": $(this).val()
                    },
                    success:function(data) {
                        console.log(data);
                        var t = $('#datapost').DataTable({
                            "bDestroy": true, 
                            bJQueryUI: true,
                            aaData: data,
                            aoColumns: [
                                { mData: 'id' ,"fnRender": function( oObj ) { return oObj.aData[3].id }},
                                { mData: 'ref_sub_kategori.ref_kategori.nama_kategori' ,"fnRender": function( oObj ) { return oObj.aData[5].ref_sub_kategori.ref_kategori.nama_kategori }},
                                { mData: 'ref_sub_kategori.nama_sub_kategori' ,"fnRender": function( oObj ) { return oObj.aData[3].ref_sub_kategori.nama_sub_kategori }},
                                { mData: 'nama_data' ,"fnRender": function( oObj ) { return oObj.aData[3].nama_data }},                    
                                { mData: 'ref_sumber_data.nama_sumber_data' ,"fnRender": function( oObj ) { return oObj.aData[3].ref_sumber_data.nama_sumber_data }},
                                { mData: 'url_data',"mRender": function(data, type, full) {
                                  return '<a href="' + data + '" target="_blank"><i class="fa fa-download"></i> Download</a>';
                                }}
                                      ]

                        });

                        t.on( 'order.dt search.dt', function () {
                            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                                cell.innerHTML = i+1;
                            });
                        }).draw();

                     }
                });
            });

        } );
    </script>
@endif
@endpush
