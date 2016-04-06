@extends('layout')
@section('body')
    @include('pages.'.Auth::user()->role.'.navbar')
    @include('flash::message')
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    {!! Form::open([
        'action' => 'UsersController@store',
        'class' => 'form-horizontal',
        'role' => 'form',
        'method' => ''
        ]) !!}
    <fieldset>
        <!-- Form Name -->
        <legend>Create user</legend>

        <div class="form-group">
            {!! Form::label('name', 'Name:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::text('name', null, ['class' => 'form-control input-md', 'placeholder' => 'John', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('surname', 'Surname:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::text('surname', null, ['class' => 'form-control input-md', 'placeholder' => 'Smith', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('email', 'E-mail:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::input('email', 'email', null, ['class' => 'form-control input-md', 'placeholder' => 'john.smith@gmail.com', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('phone', 'Phone:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::text('phone', null, ['class' => 'form-control input-md', 'placeholder' => '077985622132']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('password', 'Password:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::input('password', 'password', null, ['class' => 'form-control input-md', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('password_confirmation', 'Repeat password:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control input-md']) !!}
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
                {!! Form::submit('Create manager', ['class' => 'btn btn-success']) !!}
            </div>
        </div>

    </fieldset>
    {!! Form::close() !!}
@endsection