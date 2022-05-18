@extends('layouts.main')

@section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header align-items-center justify-content-between">
                            <center><h5 class="m-0 font-weight-bold text-primary">Daftar Pengguna</h5></center>
                        </div>
                        <div class="card-body" style="padding: 4rem;">
                            <div class="col-sm-12">
                                @if(session()->get('success'))
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                    </div>
                                @endif
                            </div>

                            <div class="table-responsive-lg">
                                {{ csrf_field() }}
                            <table id="datapost" class="display" style="width: 100%">
                                <thead>
                                <tr>
                                    <th style="text-align: center;" width="5%">No</th>
                                    <th style="text-align: center;">Nama</th>
                                    <th style="text-align: center;">Peran</th>
                                    <th style="text-align: center;">Jumlah Akses</th>
                                    <th style="text-align: center;">Total Waktu Akses</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($user as $data)
                                    <tr>
                                        <td style="text-align: center;">{{$loop->iteration}}</td>
                                        <td>{{$data->name}}</td>
                                        <td style="text-align: center;">{{$data->role->nama_role}}</td>
                                        <td style="text-align: center;">
                                            @if($data->countlog > 0)
                                                {{$data->countlog}}
                                            @endif
                                        </td>
                                        <td style="text-align: center;">
                                            @if($data->sumlog > 0)
                                                {{sprintf('%02d jam %02d menit %02d detik', (round($data->sumlog)/3600),(round($data->sumlog)/60%60), round($data->sumlog)%60)}}
                                            @endif
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