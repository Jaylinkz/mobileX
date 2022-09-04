<div class="row">
    <div class="col-md-4 form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
</div>
{{-- <div class="form-group{{ $errors->has('country_id') ? 'has-error' : ''}}">
    {!! Form::label('country_id', 'Country', ['class' => 'control-label']) !!}
    {!! Form::select('country_id', $countries, null, ['class' => 'form-control chosen-select', 'required' => 'required']) !!}
    {!! $errors->first('country_id', '<p class="help-block">:message</p>') !!}

</div>

<div class="form-group{{ $errors->has('status') ? 'has-error' : ''}}">
    {!! Form::label('status', 'Status', ['class' => 'control-label']) !!}
    <div class="checkbox">
    <label>{!! Form::radio('status', '1', true) !!} Yes</label>
</div>
<div class="checkbox">
    <label>{!! Form::radio('status', '0') !!} No</label>
</div>
    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
</div> --}}

<div class="row">
 <div class="col-md-4 form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Add', ['class' => 'btn btn-primary']) !!}
</div>   
</div>

