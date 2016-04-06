@extends('layout')
@section('body')
    @include('pages.admin.navbar')
    @include('flash::message')
    <a href="{{ action('ManagerController@create') }}" type="button" class="btn btn-success mb-20px">Add manager</a>
    @if(count($managers) > 0)
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
        @foreach($managers as $manager)
            <tr>
                <td>{{ $manager->id }}</td>
                <td>{{ $manager->name.' '.$manager->surname }}</td>
                <td>{{ $manager->email }}</td>
                <td>{{ $manager->phone }}</td>
                <td>
                    <a href="{{ action('ManagerController@edit', $manager->id) }}" class="btn btn-xs btn-success">Edit</a>
                    {!! Form::open([
                    'method' => 'DELETE',
                    'action' => ['ManagerController@destroy', $manager->id],
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