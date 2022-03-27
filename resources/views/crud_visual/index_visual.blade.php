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
                                <a style="margin-bottom: 1em;" href="{{ route('visual.create') }}" class="btn btn-primary btn-sm pull-right">Tambah Data</a>
                            </div>

                            <div class="table-responsive-lg">
                                {{ csrf_field() }}
                            <table id="datapost" class="display" style="width: 100%">
                                <thead>
                                <tr>
                                    <th style="text-align: center;" width="5%">No</th>
                                    <th style="text-align: center;">Judul</th>
                                    <th style="text-align: center;">Jenis Visual</th>
                                    <th style="text-align: center;">Tampil</th>
                                    <th width="5%"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($visual as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data->judul}}</td>
                                        <td style="text-align: center;">{{$data->refJenisVisual->nama_jenis_visual}}</td>
                                        <td style="text-align: center;">{{($data->pilih_visual == 1) ? 'Ya' : 'Tidak'}}</td>
                                        <td>
                                            <a href="{{ route('visual.edit',['id-data'=>$data->id])}}" class="btn btn-primary">Edit</a>
                                        </td>
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
        $(document).ready(function() {
            $('#datapost').DataTable();
            $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
        } );
    </script>

@endpush