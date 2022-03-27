@extends('layouts.main')

@push('scripts')

    <script>
        var URL = window.location.origin;
    </script>
@endpush

@section('content')
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container">
                    @yield('main')
                </div>
            </div>
        </div>
    </div>
@endsection

