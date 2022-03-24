@extends('layouts.main')
@push('styles')
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css"/>
@endpush
@push('script')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
@endpush
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
                            @if(\Illuminate\Support\Facades\Auth::guard('web')->user()->role_id == '2'
                                || \Illuminate\Support\Facades\Auth::guard('web')->user()->role_id == '3')
                                <div class="d-flex flex-row-reverse">
                                    <a style="margin-bottom: 1em;" href="{{ route('list-data.create') }}" class="btn btn-primary btn-sm pull-right">Tambah Post</a>
                                </div>
                            @endif
                            <table id="datapost" class="table table-striped table-bordered" style="width: 100%">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Sub Kategori</th>
                                    <th>Nama File</th>
                                    <th>Sumber Data</th>
                                    <th>Link</th>
                                    @if(\Illuminate\Support\Facades\Auth::guard('web')->user()->role_id == '2' && '3')
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
@endsection

@push('script')
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#datapost').DataTable();
        } );
    </script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
@endpush