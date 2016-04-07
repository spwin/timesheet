@extends('layout')
@section('body')
    @include('pages.admin.navbar')
    @include('flash::message')
    <h2>{{ trans('messages.week') }}</h2>
    <p>{{ date('d/m/Y', strtotime($week->begin_date)).' - '.date('d/m/Y', strtotime($week->end_date)) }}</p>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="{{ action('TimesheetController@view', $week->id) }}">{{ trans('messages.by-user') }}</a></li>
        <li role="presentation"><a href="{{ action('TimesheetController@byDays', $week->id) }}">{{ trans('messages.by-day') }}</a></li>
        <li role="presentation"><a href="{{ action('TimesheetController@onlyFixes', $week->id) }}">{{ trans('messages.only-fixes') }}</a></li>
    </ul>
    @foreach($users as $user)
        @if($user->days()->where($where)->where('status', '<>', 'none')->count() > 0)
            <h2>{{ $user->surname.' '.$user->name }}</h2>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>{{ trans('messages.date') }}</th>
                    <th>{{ trans('messages.day') }}</th>
                    <th>{{ trans('messages.status') }}</th>
                    <th>{{ trans('messages.earned') }}</th>
                    <th>{{ trans('messages.worked') }}</th>
                </tr>
                </thead>
                <tbody>
                <?php $total = 0; ?>
                @foreach($user->days()->select(['day.status as status', 'day.id as id', 'day.date as date', 'day.approved as approved', 'day.cancelled as cancelled'])->where($where)->leftJoin('week', 'week.id', '=', 'day.week_id')->where('status', '<>', 'none')->orderBy('date', 'DESC')->get() as $day)
                    <?php $total += ($day->status == 'day' ? $day_fare : $night_fare) ?>
                    <tr>
                        {!! Form::open([
                        'method' => '',
                        'action' => ['DayController@approve', $day->id]
                        ]) !!}
                        <td class="vert-align">{{ date('d/m/Y', strtotime($day->date)) }}</td>
                        <td class="vert-align"><strong>{{ date('l', strtotime($day->date)) }}</strong></td>
                        <td class="vert-align">
                            {!! $day->status == 'none' ?
                                '<span class="label label-warning">'.trans('messages.status-not-submitted').'</span>' :
                                ($day->approved ? '<span class="label label-success">'.trans('messages.status-approved').'</span>' :
                                ($day->cancelled ? '<span class="label label-danger">'.trans('messages.status-cancelled').'</span>' :
                                '<span class="label label-info">'.trans('messages.status-waiting-approval').'</span>')) !!}
                        </td>
                        <td class="vert-align">
                            <strong>£ {{ $day->status == 'day' ? $day_fare : $night_fare }}</strong>
                        </td>
                        <td class="vert-align">
                            {!! $day->status == 'day' ? '<i class="fa fa-sun-o text-warning"></i> '.trans('messages.day-shift') : '<i class="fa fa-moon-o text-primary"></i> '.trans('messages.night-shift') !!}
                        </td>
                        {!! Form::hidden('id', $day->id) !!}
                        {!! Form::close() !!}
                    </tr>
                @endforeach
                @foreach($user->fixes()->where(['week_id' => $week->id])->get() as $fix)
                    <tr>
                        <td class="vert-align">{{ trans('messages.table-fix') }}</td>
                        <td class="vert-align text-left width-300px" colspan="2"><strong>{{ trans('messages.comment') }} </strong>{{ $fix->comment }}</td>
                        <td class="vert-align" colspan="2"><strong>£ {{ $fix->sum + 0 }}</strong></td>
                    </tr>
                    <?php $total += $fix->sum; ?>
                @endforeach
                    <tr>
                        <td class="vert-align text-right" colspan="3">{{ trans('messages.total') }} </td>
                        <td class="vert-align" colspan="2"><strong>£ {{ $total }}</strong></td>
                    </tr>
                </tbody>
            </table>
        @endif
    @endforeach
@endsection
@push('scripts')
<script type="text/javascript">
    $("input:checkbox").click(function() {
        if ($(this).is(":checked")) {
            var group = "input:checkbox." + $(this).attr("class");
            $(group).prop("checked", false);
            $(this).prop("checked", true);
        } else {
            $(this).prop("checked", false);
        }
    });
</script>
@endpush