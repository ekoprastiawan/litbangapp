@extends('layouts.main')
@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css" />
@endpush
@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header align-items-center justify-content-between">
                        <center>
                            <h5 class="m-0 font-weight-bold text-primary">Data Analitis</h5>
                        </center>
                    </div>
                    <div class="card-body" style="padding: 4rem;">
                        <div class="col-sm-12">
                            @if (session()->get('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                        </div>
                        <div class="d-flex flex-row-reverse">
                            <a style="margin-bottom: 1em;" href="{{ route('analytic.create') }}"
                                class="btn btn-primary btn-sm pull-right">Tambah Data</a>
                        </div>
                        <table id="datapost" class="table table-striped table-bordered" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Uraian</th>
                                    <th>Link Report</th>
                                    <th>Link Dashboard</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($analytic as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->judul }}</td>
                                        <td>
                                            {{ Carbon\Carbon::parse($data->created_at)->format('d M Y') }}.
                                            {{ \Illuminate\Support\Str::words($data->uraian, 50) }} <a href="{{ route('analytic.detail', ['id-data' => $data->id]) }}">more</a>
                                        </td>

                                        <td> <a href='{{ asset('storage' . $data->file_url) }}'
                                                target='_blank'>Read Report</a>
                                        </td>
                                        <td><a href="{{ $data->dashboard_url }}" target="_blank"><i
                                                    class="fa fa-download"></i> View Dashboard</a></td>

                                        <td>
                                            <a href="{{ route('analytic.edit', ['id-data' => $data->id]) }}"
                                                class="btn btn-primary">Edit</a>
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
@endsection

@push('scripts')
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function() {
            $('#datapost').DataTable();
        });
    </script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
@endpush
