@extends('layout')
@section('body')
    @include('pages.'.Auth::user()->role.'.navbar')
    @include('flash::message')
    <a href="{{ action('UsersController@create') }}" type="button" class="btn btn-success mb-20px">{{ trans('messages.button-add-user') }}</a>
    @if(count($users) > 0)
    <table class="table">
        <thead>
        <tr>
            <th>#ID</th>
            <th>{{ trans('messages.table-name') }}</th>
            <th>{{ trans('messages.table-language') }}</th>
            <th>{{ trans('messages.table-email') }}</th>
            <th>{{ trans('messages.table-phone') }}</th>
            <th>{{ trans('messages.table-actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name.' '.$user->surname }}</td>
                <td>{{ strtoupper($user->language) }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>
                    <a href="{{ action('UsersController@edit', $user->id) }}" class="btn btn-xs btn-success">{{ trans('messages.button-edit') }}</a>
                    {!! Form::open([
                    'method' => 'DELETE',
                    'action' => ['UsersController@destroy', $user->id],
                    'class' => 'inline-block',
                    'onclick'=>'return confirm("'.trans('messages.are-you-sure').'")'
                    ]) !!}
                    {!! Form::submit( trans('messages.button-delete'), ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
@endsection