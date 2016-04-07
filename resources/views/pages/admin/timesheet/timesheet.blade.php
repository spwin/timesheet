@extends('layout')
@section('body')
    @include('pages.admin.navbar')
    @include('flash::message')
    <h1>{{ trans('messages.payroll') }}</h1>
    @if(count($weeks) > 0)
        <table class="table table-hover">
            <thead>
            <tr>
                <th>{{ trans('messages.table-starts') }}</th>
                <th>{{ trans('messages.table-ends') }}</th>
                <th>{{ trans('messages.table-salaries') }}</th>
                <th>{{ trans('messages.table-fixes') }}</th>
                <th>{{ trans('messages.table-total') }}</th>
                <th></th>
                <th>{{ trans('messages.table-status') }}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($weeks as $week)
                    <tr>
                        <td class="vert-align">{{ $week->begin_date }}</td>
                        <td class="vert-align">{{ $week->end_date }}</td>
                        <td class="vert-align"><strong>£ {{ ($week->days()->where('status', '=', 'day')->where(['approved' => 1])->count() * $day_fare + $week->days()->where('status', '=', 'night')->where(['approved' => 1])->count() * $night_fare) }}</strong></td>
                        <td class="vert-align"><strong>£ {{ $week->fixes()->sum('sum') + 0 }}</strong></td>
                        <td class="vert-align"><strong>£ {{ ($week->days()->where('status', '=', 'day')->where(['approved' => 1])->count() * $day_fare + $week->days()->where('status', '=', 'night')->where(['approved' => 1])->count() * $night_fare) + $week->fixes()->sum('sum') }}</strong></td>
                        <td class="vert-align"><a href="{{ action('TimesheetController@view', ['id' => $week->id]) }}" class="btn btn-primary">{{ trans('messages.table-show') }}</a></td>
                        <td class="vert-align">
                            {!! $week->current == 1 ? '<span class="label label-info">'.trans('messages.status-current').'</span>' : ($week->approved == 1 ? '<span class="label label-warning">'.trans('messages.status-approved').'</span>' : '') !!}
                            @if($week->current == 0 && $week->approved == 0)
                                @if($week->days()->where(['submitted' => 1, 'approved' => 0])->count() != $week->days()->where(['submitted' => 1, 'cancelled' => 1])->count())
                                    <i class="fa fa-exclamation-triangle text-warning"></i> {{ $week->days()->where(['day.submitted' => 1, 'day.approved' => 0, 'day.cancelled' => 0])->leftJoin('week', 'week.id', '=', 'day.week_id')->where(['week.approved' => 0, 'week.current' => 0])->count() }} {{ trans('messages.pending-requests') }}
                                @else
                                    <a href="{{ action('WeekController@approve', $week->id) }}" class="btn btn-medium btn-success">{{ trans('messages.button-approve') }}</a>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection