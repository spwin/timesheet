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
    {!! Form::open([
        'action' => 'FixesController@store',
        'class' => 'form-horizontal',
        'role' => 'form',
        'method' => ''
        ]) !!}
    <fieldset>
        <!-- Form Name -->
        <legend>Add fix for week {{ date('d/m/Y', strtotime($week->begin_date)).' - '.date('d/m/Y', strtotime($week->end_date)) }}</legend>

        {!! Form::hidden('week_id', $week->id) !!}

        <div class="form-group">
            {!! Form::label('user_id', 'User:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::select('user_id', $users, null, ['class' => 'form-control input-md', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('sum', 'Sum (£):', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::input('number', 'sum', null, ['class' => 'form-control input-md', 'required' => 'required']) !!}
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('comment', 'Comment:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-4">
                {!! Form::textarea('comment', null, ['class' => 'form-control input-md', 'required' => 'required']) !!}
            </div>
        </div>

        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="submit"></label>
            <div class="col-md-4">
                {!! Form::submit('Add this fix', ['class' => 'btn btn-success']) !!}
            </div>
        </div>

    </fieldset>
    {!! Form::close() !!}
@endsection