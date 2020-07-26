@if (isset($store))
    {!! Form::hidden('id', $store->id) !!}
@endif

<!-- Nama -->
@if ($errors->any())
    <div class="form-group {{ $errors->has('nama_store') ? 
        'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('nama_store', 'Store :', ['class' => 'control-label']) !!}
    {!! Form::text('nama_store', null, ['class' => 'form-control']) !!}
    @if ($errors->has('nama_store'))
        <span class="help-block">{{ $errors->first('nama_store') }}</span>
    @endif
</div>

<!-- Submit Button -->
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>