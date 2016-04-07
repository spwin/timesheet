@extends('layout')
@section('body')
    @include('pages.admin.navbar')
    @include('flash::message')
    <h2>{{ trans('messages.week') }}</h2>
    <p>{{ date('d/m/Y', strtotime($week->begin_date)).' - '.date('d/m/Y', strtotime($week->end_date)) }}</p>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation"><a href="{{ action('TimesheetController@view', $week->id) }}">{{ trans('messages.by-user') }}</a></li>
        <li role="presentation"><a href="{{ action('TimesheetController@byDays', $week->id) }}">{{ trans('messages.by-day') }}</a></li>
        <li role="presentation" class="active"><a href="{{ action('TimesheetController@onlyFixes', $week->id) }}">{{ trans('messages.only-fixes') }}</a></li>
    </ul>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>#ID</th>
            <th>{{ trans('messages.table-user') }}</th>
            <th>{{ trans('messages.table-sum') }}</th>
            <th>{{ trans('messages.table-comment') }}</th>
        </tr>
        </thead>
        <tbody>
        <?php $total = 0; ?>
        @foreach($fixes as $fix)
            <?php $total += $fix->sum; ?>
            <tr>
                <td class="vert-align">{{ $fix->id }}</td>
                <td class="vert-align">{{ $fix->user()->first()->name.' '.$fix->user()->first()->surname }}</td>
                <td class="vert-align"><strong>£ {{ $fix->sum }}</strong></td>
                <td class="vert-align width-300px">{{ $fix->comment }}</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2" class="text-right vert-align">{{ trans('messages.total') }} </td>
            <td colspan="2" class="text-left vert-align"><strong>£ {{ $total }}</strong></td>
        </tr>
        </tbody>
    </table>
@endsection