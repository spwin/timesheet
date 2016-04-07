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
    {!! Form::model($user, [
               'method' => 'PATCH',
               'action' => ['UsersController@update', $user->id],
               'class' => 'form-horizontal'
               ]) !!}
    <fieldset>
        <!-- Form Name -->
        <legend>{{ trans('messages.edit-user') }}</legend>

        <div class="form-group">
            {!! Form::label('name', trans('messages.field-name'), ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::text('name', null, ['class' => 'form-control input-md', 'placeholder' => 'John', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('surname', trans('messages.field-surname'), ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::text('surname', null, ['class' => 'form-control input-md', 'placeholder' => 'Smith', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('email', trans('messages.field-email'), ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::input('email', 'email', null, ['class' => 'form-control input-md', 'placeholder' => 'john.smith@gmail.com', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('phone', trans('messages.field-phone'), ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::text('phone', null, ['class' => 'form-control input-md', 'placeholder' => '077985622132']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('password', trans('messages.field-new-pass'), ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::input('password', 'password', null, ['class' => 'form-control input-md']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('password_confirmation', trans('messages.field-repeat-pass'), ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control input-md']) !!}
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
                {!! Form::submit(trans('messages.button-update-user'), ['class' => 'btn btn-success']) !!}
            </div>
        </div>

    </fieldset>
    {!! Form::close() !!}
@endsection