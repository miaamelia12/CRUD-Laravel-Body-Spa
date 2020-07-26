@extends('template')

@section('main')
    <div id="homepage">
        <center>
       	<br>
        <img src="{{ asset('fotoupload/logo.jpeg') }}" width="500" height="400">
        </center>	
    </div>
@stop

@section('footer')
    @include('footer')
@stop
