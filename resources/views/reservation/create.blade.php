@extends('template')

@section('main')
<div id = 'reservation'>
	<h2>Tambah Reservasi</h2>

	{!! Form::open(['url' => 'reservation', 'files' => true]) !!}
		@include('reservation.form', ['submitButtonText' => 'Simpan'])
	{!! Form::close() !!}
</div>
@stop

@section('footer')
	@include('footer')
@stop
