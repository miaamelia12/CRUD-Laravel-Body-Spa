@extends('template')

@section('main')
<div id = 'reservation'>
	<h2>Edit Reservation</h2>

	{!! Form::model($reservation, ['method' => 'PATCH', 'files' => true, 'action' => ['ReservationController@update', $reservation->id]]) !!}
  	@include('reservation.form', ['submitButtonText' => 'Update'])
  	{!! Form::close() !!}
</div>
@stop

@section('footer')
	@include('footer')
@stop
