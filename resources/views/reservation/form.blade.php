@if (isset($reservation))
	{!! Form::hidden('id', $reservation->id) !!}
@endif


<!-- ID Reservation -->
@if ($errors->any())
	<div class="form-group {{ $errors->has('id_reservation') ?
	'has-error' : 'has-success' }}"> 
@else
	<div class="form-group">
@endif
	{!! Form::label('id_reservation', 'ID Reservasi :', ['class' => 'control-label']) !!}
	{!! Form::text('id_reservation', null, ['class' => 'form-control']) !!}
	@if ($errors->has('id_reservation'))
	<span class="help-block">
		{{ $errors->first('id_reservation') }}
	</span>
	@endif
</div>


<!-- Nama Customer -->
@if ($errors->any())
	<div class="form-group {{ $errors->has('nama_customer') ?
	'has-error' : 'has-success' }}"> 
@else
	<div class="form-group">
@endif
	{!! Form::label('nama_customer', 'Nama :', ['class' => 'control-label']) !!}
	{!! Form::text('nama_customer', null, ['class' => 'form-control']) !!}
	@if ($errors->has('nama_customer'))
	<span class="help-block">
		{{ $errors->first('nama_customer') }}
	</span>
	@endif
</div>

<!-- Store -->
@if ($errors->any())
	<div class="form-group {{ $errors->has('id_store') ?
		'has-error' : 'has-success' }}">
@else
	<div class="form-group">
@endif
	{!! Form::label('id_store', 'Store :', ['class' => 'control-label']) !!}
	@if(count($list_store) > 0)
	{!! Form::select('id_store', $list_store, null, ['class' => 'form-control', 'id' => 'id_store',
	'placeholder' => 'Pilih Store']) !!}
	@else
		<p>Tidak Ada Pilihan Store</p>
	@endif
	@if ($errors->has('id_store'))
	<span class="help-block">{{ $errors->first('id_store') }}</span>
	@endif
	</div>

<!-- Treatment -->
@if ($errors->any())
	<div class="form-group {{ $errors->has('id_treatment') ?
		'has-error' : 'has-success' }}">
@else
	<div class="form-group">
@endif
	{!! Form::label('id_treatment', 'Treatment :', ['class' => 'control-label']) !!}
	@if(count($list_treatment) > 0)
	{!! Form::select('id_treatment', $list_treatment, null, ['class' => 'form-control', 'id' => 'id_treatment',
	'placeholder' => 'Pilih Treatment']) !!}
	@else
		<p>Tidak Ada Pilihan Treatment</p>
	@endif
	@if ($errors->has('id_treatment'))
	<span class="help-block">{{ $errors->first('id_treatment') }}</span>
	@endif
	</div>


<!-- Date Book -->
@if ($errors->any())
	<div class="form-group {{ $errors->has('date_book') ?
	'has-error' : 'has-success' }}"> 
@else
	<div class="form-group">
@endif
	{!! Form::label('date_book', 'Date Book :', ['class' => 'control-label']) !!}
	{!! Form::date('date_book', !empty($reservation) ?
	$reservation->date_book->format('Y-m-d'):null, 
	['class' => 'form-control', 'id' => 'date_book']) !!}
	@if ($errors->has('date_book'))
	<span class="help-block">
		{{ $errors->first('date_book') }}</span>
	@endif
</div>


<!-- Alamat -->
@if ($errors->any())
	<div class="form-group {{ $errors->has('alamat') ?
	'has-error' : 'has-success' }}"> 
@else
	<div class="form-group">
@endif
	{!! Form::label('alamat', 'Alamat :', ['class' => 'control-label']) !!}
	{!! Form::text('alamat', null, ['class' => 'form-control']) !!}
	@if ($errors->has('alamat'))
	<span class="help-block">
		{{ $errors->first('alamat') }}
	</span>
	@endif
</div>


<!-- Email -->
@if ($errors->any())
	<div class="form-group {{ $errors->has('email') ?
	'has-error' : 'has-success' }}"> 
@else
	<div class="form-group">
@endif
	{!! Form::label('email', 'Email :', ['class' => 'control-label']) !!}
	{!! Form::text('email', null, ['class' => 'form-control']) !!}
	@if ($errors->has('email'))
	<span class="help-block">
		{{ $errors->first('email') }}
	</span>
	@endif
</div>


<!-- Foto -->
@if ($errors->any())
<div class="form-group {{ $errors->has('foto') ? 
	'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
    {!! Form::label('foto', 'Foto :') !!}
    {!! Form::file('foto') !!}
    @if ($errors->has('foto'))
        <span class="help-block">{{ $errors->first('foto') }}</span>
    @endif
</div>


<!-- Menampilkan Foto -->
@if (isset($product))
	@if (isset($product->foto))
		<img src="{{ asset('fotoupload/' .$product->foto) }}">		
	@else
		<img src="{{ asset('fotoupload/dummyfemale.jpg') }}">
	@endif
@endif

<br><br><br>
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
