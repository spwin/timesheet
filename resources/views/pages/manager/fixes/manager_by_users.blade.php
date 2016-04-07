@extends('layout')
@section('body')
    @include('pages.manager.navbar')
    @include('flash::message')
    <h2>{{ trans('messages.fixes-list-for-user') }} <strong>{{ $user->name.' '.$user->surname }}</strong></h2>
    <a href="{{ action('FixesController@index') }}" class="inline-block mb-20px">{{ trans('messages.show-all-fixes') }}</a>
    @foreach($weeks as $week)
        @if($week->fixes()->where(['user_id' => $user->id])->count() > 0)
            <h3><a href="{{ action('FixesController@weekly', $week->id) }}">{{ trans('messages.week') }} ({{ date('d/m/Y', strtotime($week->begin_date)).' - '.date('d/m/Y', strtotime($week->end_date)) }})</a></h3>
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
                @foreach($week->fixes()->where(['user_id' => $user->id])->get() as $fix)
                    <tr>
                        <td class="vert-align">{{ $fix->id }}</td>
                        <td class="vert-align">{{ $fix->user()->first()->surname.' '.$fix->user()->first()->name }}</td>
                        <td class="vert-align">{{ '£ '. $fix->sum }}</td>
                        <td class="vert-align">{{ $fix->comment }}</td>
                        <td class="vert-align">
                            <a href="{{ action('FixesController@edit', $fix->id) }}" class="btn btn-success">{{ trans('messages.button-edit') }}</a>
                            <a href="" class="btn btn-danger">{{ trans('messages.button-delete') }}</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    @endforeach
@endsection