@extends('template')


@section('main')
	<div id="treatment">
		<h2>Edit Treatment</h2>

		{!! Form::model($treatment, ['method' => 'PATCH', 'action' => ['TreatmentController@update', $treatment->id]]) !!}
			@include('treatment.form', ['submitButtonText' => 'Update'])
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop