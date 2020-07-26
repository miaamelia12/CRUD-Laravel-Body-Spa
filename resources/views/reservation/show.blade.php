@extends('template')

@section('main')
<div id='reservation'>
	<h2>Detail Reservation</h2>

		<table class="table table-striped bg-success">
			<tr>
				<th>ID Reservation</th>
				<td>{{ $reservation->id_reservation }}</td>
			</tr>

			<tr>
				<th>Nama</th>
				<td>{{ $reservation->nama_customer }}</td>
			</tr>

			<tr>
				<th>Store</th>
				<td>{{ $reservation->store->nama_store }}</td>
			</tr>

			<tr>
				<th>Treatment</th>
				<td>{{ $reservation->treatment->nama_treatment }}</td>
			</tr>

			<tr>
				<th>Date Book</th>
				<td>{{ $reservation->date_book->format('d-m-Y') }}</td>
			</tr>

			<tr>
				<th>Alamat</th>
				<td>{{ $reservation->alamat }}</td>
			</tr>

			<tr>
				<th>Email</th>
				<td>{{ $reservation->email }}</td>
			</tr>

			<tr>
				<th>Foto</th>
				<td>
					@if (isset($reservation->foto))
					<img src="{{ asset('fotoupload/' .$reservation->foto) }}">
					@else
					<img src="{{ asset('fotoupload/dummyfemale.jpg') }}">
					@endif
				</td>
			</tr>
		</table>
	</div>
@stop

@section('footer')
	@include('footer')
@stop