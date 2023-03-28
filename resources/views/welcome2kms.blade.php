@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            
            <form id="id_form" method="POST" action="{{ route('loginkms') }}">
                @csrf

                <input type="text" name="tokenkms" id="tokenkms" value="{{$kms}}" hidden />
                <input type="submit" value="Submit" hidden />

            </form>
            
        </div>
    </div>
    
@endsection

@push('js1')
<script>
$(document).ready(function() {
    if (document.getElementById("tokenkms").value !== "") {
      document.getElementById("id_form").submit();
    }
});
</script>
@endpush


