@extends('template')

@section('main')
<div id ='reservation'>
	<h2>Reservation</h2>

	@include('_partial.flash_message')
	
	@if (!empty($reservation_list))
	<table class="table table-striped bg-success">
		<thead>
			<tr>
				<th>ID Reservation</th>
				<th>Nama</th>
				<th>Store</th>
				<th>Treatment</th>
				<th>Date Book</th>
				<th>Alamat</th>
				<th>Email</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($reservation_list as $reservation)
			<tr>
				<td>{{ $reservation->id_reservation }}</td>
				<td>{{ $reservation->nama_customer }}</td>
				<td>{{ $reservation->store->nama_store }}</td>
				<td>{{ $reservation->treatment->nama_treatment }}</td>
				<td>{{ $reservation->date_book->format('d-m-Y') }}</td>
				<td>{{ $reservation->alamat }}</td>
				<td>{{ $reservation->email }}</td>

				<td>
					<div class="box-button">
						{{ link_to('reservation/' . $reservation->id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
					</div>
					<div class="box-button">
						{{ link_to('reservation/' . $reservation->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
					</div>
					<div class="box-button">
						{!! Form::open(['method' => 'DELETE', 'action' => ['ReservationController@destroy', $reservation->id]]) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
						{!! Form::close() !!}
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@else
	<p>Tidak Ada Data Reservasi</p>
	@endif

	<div class="table-nav">
	<div class="jumlah-data">
		<strong>Total : {{ $jumlah_reservation }}</strong>
	</div>
	<div class="paging">
		{{ $reservation_list->links() }}
	</div>

	</div>

	<div class="tombol-nav">
		<a href="{{ url('reservation/create') }}" class="btn btn-primary">
		Tambah</a>
	</div>
</div>

@stop

@section('footer')
	@include('footer')
@stop
