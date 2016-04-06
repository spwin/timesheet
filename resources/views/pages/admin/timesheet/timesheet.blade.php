@extends('layout')
@section('body')
    @include('pages.admin.navbar')
    @include('flash::message')
    <h1>Payroll</h1>
    @if(count($weeks) > 0)
        <table class="table table-hover">
            <thead>
            <tr>
                <th>STARTS</th>
                <th>ENDS</th>
                <th>SALARIES</th>
                <th>FIXES</th>
                <th>TOTAL</th>
                <th>SHOW</th>
                <th>STATUS</th>
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
                        <td class="vert-align"><a href="{{ action('TimesheetController@view', ['id' => $week->id]) }}" class="btn btn-primary">show</a></td>
                        <td class="vert-align">
                            {!! $week->current == 1 ? '<span class="label label-info">CURRENT</span>' : ($week->approved == 1 ? '<span class="label label-warning">APPROVED</span>' : '') !!}
                            @if($week->current == 0 && $week->approved == 0)
                                @if($week->days()->where(['submitted' => 1, 'approved' => 0])->count() != $week->days()->where(['submitted' => 1, 'cancelled' => 1])->count())
                                    <i class="fa fa-exclamation-triangle text-warning"></i> {{ $week->days()->where(['day.submitted' => 1, 'day.approved' => 0, 'day.cancelled' => 0])->leftJoin('week', 'week.id', '=', 'day.week_id')->where(['week.approved' => 0, 'week.current' => 0])->count() }} pending requests
                                @else
                                    <a href="{{ action('WeekController@approve', $week->id) }}" class="btn btn-medium btn-success">Approve</a>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection