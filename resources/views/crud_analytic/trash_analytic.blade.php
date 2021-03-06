@extends('layouts.main')

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
                            @if (Auth::check())
                            @if(Auth::guard('web')->user()->role_id == '2' || Auth::guard('web')->user()->role_id == '3')
                            <a style="margin-bottom: 1em; margin-left: 1em;" href="{{ route('analytic.index') }}"
                                class="btn btn-success btn-sm pull-right"> List Data</a>
                            @endif
                            @endif                           
                        </div>
                        <div class="table-responsive-lg">
                                {{ csrf_field() }}
                        <table id="datapost" class="display" style="width: 100%">
                            <thead>
                                <tr>
                                    <th style="text-align: center;" width="5%">No.</th>
                                    <th style="text-align: center;">Judul</th>
                                    <th style="text-align: center;">Uraian</th>
                                    <th style="text-align: center;" width="10%">Report</th>
                                    <th style="text-align: center;" width="15%">Dashboard</th>
                                    @if(Auth::check())
                                    <th width="5%"></th>
                                    @if(Auth::guard('web')->user()->role_id == '2' || Auth::guard('web')->user()->role_id == '3')
                                    <th width="5%"></th>
                                    @endif
                                    @endif
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

                                        <td style="text-align: center;"> <a href='{{ asset('storage' . $data->file_url) }}'
                                                target='_blank'>Read Report</a>
                                        </td>
                                        <td style="text-align: center;">
                                            @if($data->dashboard_url)
                                            <a href="{{ $data->dashboard_url }}" target="_blank"><i
                                                    class="fa fa-download"></i> View Dashboard</a>
                                            @endif
                                        </td>
                                        @if(Auth::check())
                                        <td>                                            
                                            @if(Auth::guard('web')->user()->role_id == '2' || Auth::guard('web')->user()->role_id == '3' || (Auth::guard('web')->user()->role_id == '1' && $data->created_by == Auth::guard('web')->user()->niplama))
                                            <a href="{{ route('analytic.edit', ['id-data' => $data->id]) }}"
                                                class="btn btn-primary"> Edit</a>
                                            @endif                                            
                                        </td>                                        
                                        @if(Auth::guard('web')->user()->role_id == '2' || Auth::guard('web')->user()->role_id == '3')
                                        <td>
                                            <form method="POST" action="{{ route('analytic.restore', ['id-data' => $data->id]) }}">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-success btn-xs" onclick="return confirm('Yakin akan mengembalikan data ini?')"> Kembalikan</button>
                                            </form>
                                        </td>
                                        @endif
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
        $(document).ready(function() {
            $('#datapost').DataTable();
            $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
        });
    </script>

@endpush
