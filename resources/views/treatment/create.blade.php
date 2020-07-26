@extends('template')


@section('main')
	<div id="treatment">
		<h2>Tambah Treatment</h2>

		{!! Form::open(['url' => 'treatment']) !!}
		@include('treatment.form', ['submitButtonText' => 'Simpan'])
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop