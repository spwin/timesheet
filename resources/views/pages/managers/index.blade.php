@extends('layout')
@section('body')
    @include('pages.admin.navbar')
    @include('flash::message')
    <a href="{{ action('ManagerController@create') }}" type="button" class="btn btn-success mb-20px">{{ trans('messages.button-add-manager') }}</a>
    @if(count($managers) > 0)
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
        @foreach($managers as $manager)
            <tr>
                <td>{{ $manager->id }}</td>
                <td>{{ $manager->name.' '.$manager->surname }}</td>
                <td>{{ strtoupper($manager->language) }}</td>
                <td>{{ $manager->email }}</td>
                <td>{{ $manager->phone }}</td>
                <td>
                    <a href="{{ action('ManagerController@edit', $manager->id) }}" class="btn btn-xs btn-success">{{ trans('messages.button-edit') }}</a>
                    {!! Form::open([
                    'method' => 'DELETE',
                    'action' => ['ManagerController@destroy', $manager->id],
                    'class' => 'inline-block',
                    'onclick'=>'return confirm("'.trans('messages.are-you-sure').'")'
                    ]) !!}
                    {!! Form::submit(trans('messages.button-delete'), ['class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @endif
@endsection