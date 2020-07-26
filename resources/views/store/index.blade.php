@extends('template')

@section('main')
<div id ='store'>
	<h2>Store</h2>
	
	@include('_partial.flash_message')

	@if(count($store_list) > 0)
	<table class="table table-striped bg-success">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Store</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php $i = 0; ?>
			<?php foreach($store_list as $store): ?>
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $store->nama_store }}</td>

				<td>
					<div class="box-button">
						{{ link_to('store/' . $store->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
					</div>
					<div class="box-button">
						{!! Form::open(['method' => 'DELETE', 'action' => ['StoreController@destroy', $store->id]]) !!}
						{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
						{!! Form::close() !!}
					</div>
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	@else
	<p>Tidak Ada Data Store</p>
	@endif

	<div class="tombol-nav">
		<a href="store/create" class="btn btn-primary">
		Tambah</a>
	</div>
</div>

@stop

@section('footer')
	@include('footer')
@stop
