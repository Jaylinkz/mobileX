<div class="row">
    <div class="col-md-4 form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name', 'Name: ', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div style="margin: 0px 5px 0px 5px" class="col-md-4 form-group{{ $errors->has('email') ? ' has-error' : ''}}">
    {!! Form::label('email', 'Email: ', ['class' => 'control-label']) !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="col-md-4 form-group{{ $errors->has('password') ? ' has-error' : ''}}">
    {!! Form::label('password', 'Password: ', ['class' => 'control-label']) !!}
    @php
        $passwordOptions = ['class' => 'form-control'];
        if ($formMode === 'create') {
            $passwordOptions = array_merge($passwordOptions, ['required' => 'required']);
        }
    @endphp
    {!! Form::password('password', $passwordOptions) !!}
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="row">
    <div class="col-md-4 form-group{{ $errors->has('store_id') ? 'has-error' : ''}}">
    {!! Form::label('store_id', 'Store', ['class' => 'control-label']) !!}
    {!! Form::select('store_id', $stores, isset($user->store) ? $user->store->id : '', ['class' => 'form-control chosen-select']) !!}
    {!! $errors->first('store_id', '<p class="help-block">:message</p>') !!}
</div>

<div style="margin: 0px 5px 0px 5px" class="col-md-4 form-group{{ $errors->has('gender') ? ' has-error' : ''}}">
    {!! Form::label('gender', 'Gender: ', ['class' => 'control-label']) !!}
    {!! Form::select('gender', ['' => '--Select Gender--', 'male' => 'Male', 'female' => 'Female'], isset($user) ? "$user->gender" : '', ['class' => 'form-control', 'required' => 'required']) !!}
</div>

<div class="col-md-4 form-group{{ $errors->has('roles') ? ' has-error' : ''}}">
    {!! Form::label('role', 'Role: ', ['class' => 'control-label']) !!}
    {!! Form::select('roles[]', $roles, isset($user_roles) ? $user_roles : [], ['class' => 'form-control chosen-select']) !!}
</div>



<div class="row">
    <div class="col-md-4 col-md-offset-8form-group">
            <button class="btn btn-white" type="button">Cancel</button>
            {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}        </div>
    </div>
</div>
</div>


