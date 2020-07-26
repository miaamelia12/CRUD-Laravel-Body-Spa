@extends('template')

@section('main')
	<div id="treatment">
		<h2>Treatment</h2>

		@include('_partial.flash_message')

		@if(count($treatment_list) > 0)
		<table class="table table-striped bg-success">
			<thead>
				<tr>
					<th>No</th>
					<th>Treatment</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tbody>
			<?php $i = 0; ?>
			<?php foreach($treatment_list as $treatment): ?>
			<tr>
				<td>{{ ++$i }}</td>
				<td>{{ $treatment->nama_treatment }}</td>

						<td>
							<div class="box-button">
								{{ link_to('treatment/' . $treatment->id . '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
							</div>
							<div class="box-button">
								{!! Form::open(['method' => 'DELETE', 'action' => ['TreatmentController@destroy', $treatment->id]]) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
								{!! Form::close() !!}
							</div>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		@else
		<p>Tidak Ada Data Treatment</p>
		@endif
		
		<div class="tombol-nav">
		<a href="treatment/create" class="btn btn-primary">
		Tambah</a>
	</div>
</div>

@stop

@section('footer')
	@include('footer')
@stop