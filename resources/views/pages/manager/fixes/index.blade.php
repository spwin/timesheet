@extends('layout')
@section('body')
    @include('pages.manager.navbar')
    @include('flash::message')
    <h2>{{ trans('messages.select-week-for-fixes') }}</h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th></th>
            <th>{{ trans('messages.table-begins') }}</th>
            <th>{{ trans('messages.table-ends') }}</th>
            <th>{{ trans('messages.table-fixes') }}</th>
            <th>{{ trans('messages.table-actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($weeks as $week)
            <tr>
                <td class="vert-align">{{ trans('messages.period') }}</td>
                <td class="vert-align">{{ $week->begin_date }}</td>
                <td class="vert-align">{{ $week->end_date }}</td>
                <td class="vert-align">{{ $week->fixes()->count() }}</td>
                <td class="vert-align">
                    <a href="{{ action('FixesController@create', $week->id) }}" class="btn btn-success">{{ trans('messages.add-fix-for-week') }}</a>
                    <a href="{{ action('FixesController@weekly', $week->id) }}"  class="btn btn-warning">{{ trans('messages.show-fixes') }}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection