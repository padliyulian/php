@extends('layouts/main')
@section('title', 'meetings')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card js-meeting-data"></div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('/js/jquery-3.3.1.js') }}"></script>
    <script type="text/javascript">
        $.ajax({url: "/api/v1/meeting", success: function(result){
            $(".js-meeting-data").text(result.msg);
            console.log(result);
        }});
    </script>
@endsection