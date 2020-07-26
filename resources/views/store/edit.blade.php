@extends('template')

@section('main')
<div id = 'store'>
	<h2>Edit Store</h2>

	{!! Form::model($store, ['method' => 'PATCH', 'action' => ['StoreController@update', $store->id]]) !!}
  	@include('store.form', ['submitButtonText' => 'Update'])
  	{!! Form::close() !!}
</div>
@stop

@section('footer')
	@include('footer')
@stop
