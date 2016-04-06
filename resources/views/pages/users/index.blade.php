@extends('layout')
@section('body')
    @include('pages.'.Auth::user()->role.'.navbar')
    @include('flash::message')
    <a href="{{ action('UsersController@create') }}" type="button" class="btn btn-success mb-20px">Add user</a>
    @if(count($users) > 0)
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>E-mail</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name.' '.$user->surname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>
                    <a href="{{ action('UsersController@edit', $user->id) }}" class="btn btn-xs btn-success">Edit</a>
                    {!! Form::open([
                    'method' => 'DELETE',
                    'action' => ['UsersController@destroy', $user->id],
                    'class' => 'inline-block',
                    'onclick'=>'return confirm("Are you sure?")'
                    ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
@endsection