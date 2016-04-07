@extends('layout')
@section('body')
    @include('pages.manager.navbar')
    @include('flash::message')
    <h2>{{ trans('messages.fixes-list-for-week') }} ({{ date('d/m/Y', strtotime($week->begin_date)).' - '.date('d/m/Y', strtotime($week->end_date)) }})</h2>
    <a href="{{ action('FixesController@index') }}" class="block mb-20px" style="margin-top: 20px;"><i class="fa fa-arrow-circle-o-left"></i> {{ trans('messages.all-weeks') }}</a>
    <a href="{{ action('FixesController@create', $week->id) }}" class="inline-block btn btn-success mb-20px">{{ trans('messages.add-fix-for-week') }}</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>{{ trans('messages.table-user') }}</th>
            <th>{{ trans('messages.table-sum') }}</th>
            <th>{{ trans('messages.table-comment') }}</th>
            <th>{{ trans('messages.table-actions') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fixes as $fix)
            <tr>
                <td class="vert-align">{{ $fix->id }}</td>
                <td class="vert-align"><a href="{{ action('FixesController@managerUsers', $fix->user()->first()->id) }}">{{ $fix->user()->first()->surname.' '.$fix->user()->first()->name }}</a></td>
                <td class="vert-align">{{ '£ '. $fix->sum }}</td>
                <td class="vert-align width-300px">{{ $fix->comment }}</td>
                <td class="vert-align">
                    <a href="{{ action('FixesController@edit', $fix->id) }}" class="btn btn-success">{{ trans('messages.button-edit') }}</a>
                    <a href="" class="btn btn-danger">{{ trans('messages.button-delete') }}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection