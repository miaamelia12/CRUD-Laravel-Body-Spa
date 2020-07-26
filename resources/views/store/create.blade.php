@extends('template')

@section('main')
<div id = 'store'>
	<h2>Tambah Store</h2>

	{!! Form::open(['url' => 'store']) !!}
		@include('store.form', ['submitButtonText' => 'Simpan'])
	{!! Form::close() !!}
</div>
@stop

@section('footer')
	@include('footer')
@stop
