@if (isset($user))
    {!! Form::hidden('id', $treatment->id) !!}
@endif

<!-- Nama Treatment -->
@if ($errors->any())
    <div class="form-group {{ $errors->has('nama_treatment') ? 
        'has-error' : 'has-success' }}">
@else
    <div class="form-group">
@endif
    {!! Form::label('nama_treatment', 'Treatment :', ['class' => 'control-label']) !!}
    {!! Form::text('nama_treatment', null, ['class' => 'form-control']) !!}
    @if ($errors->has('nama_treatment'))
        <span class="help-block">{{ $errors->first('nama_treatment') }}</span>
    @endif
</div>

<!-- Submit Button -->
<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>