@extends('layout')
@section('body')
    @include('pages.manager.navbar')
    @include('flash::message')
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    {!! Form::model($fix, [
               'method' => 'PATCH',
               'action' => ['FixesController@update', $fix->id],
               'class' => 'form-horizontal'
               ]) !!}
    <fieldset>
        <!-- Form Name -->
        <legend>{{ trans('messages.edit-fix') }}</legend>

        {!! Form::hidden('week_id', $fix->week_id) !!}

        <div class="form-group">
            {!! Form::label('user_id', trans('messages.form-user'), ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::select('user_id', $users, null, ['class' => 'form-control input-md', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('sum', trans('messages.form-sum'), ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::input('number', 'sum', null, ['class' => 'form-control input-md', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('comment', trans('messages.form-comment'), ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::textarea('comment', null, ['class' => 'form-control input-md', 'required' => 'required']) !!}
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
                {!! Form::submit(trans('messages.save-this-fix'), ['class' => 'btn btn-success']) !!}
            </div>
        </div>

    </fieldset>
    {!! Form::close() !!}
@endsection