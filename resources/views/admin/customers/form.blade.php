<div class="row">
    <div class="col-md-3 form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div style="margin: 0px 5px 0px 5px" class="col-md-3 form-group{{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address', 'Address', ['class' => 'control-label']) !!}
    {!! Form::text('address', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>
<div class="col-md-3 form-group{{ $errors->has('mobile_number') ? 'has-error' : ''}}">
    {!! Form::label('mobile_number', 'Mobile Number', ['class' => 'control-label']) !!}
    {!! Form::text('mobile_number', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('mobile_number', '<p class="help-block">:message</p>') !!}
</div>
<div style="margin-left: 5px" class="col-md-3 form-group{{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'control-label']) !!}
    {!! Form::email('email', null, ('' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="row">
    <div class="col-md-3 form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Add', ['class' => 'btn btn-primary']) !!}
</div>
</div>


