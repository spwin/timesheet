@extends('layout')
@section('body')
    @include('pages.manager.navbar')
    @include('flash::message')
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="{{ action('TimesheetController@managersUsers') }}">{{ trans('messages.by-user') }}</a></li>
        <li role="presentation"><a href="{{ action('TimesheetController@managersDays') }}">{{ trans('messages.by-day') }}</a></li>
    </ul>
    @if($user->days()->where(['submitted' => 1])->leftJoin('week', 'week.id', '=', 'day.week_id')->where('status', '<>', 'none')->where(['week.approved' => 0])->count() > 0)
        <a href="{{ action('TimesheetController@managersUsers') }}" class="inline-block" style="margin-top: 20px;"><i class="fa fa-arrow-circle-o-left"></i> {{ trans('messages.all-users') }}</a>
        <h2>
            {{ $user->surname.' '.$user->name }}
            @if($user->fixes()->join('week', 'fixes.week_id', '=', 'week.id')->where(['week.approved' => 0])->count() > 0)
                <a class="btn btn-warning btn-xs" href="{{ action('FixesController@managerUsers', $user->id) }}">{{ $user->fixes()->join('week', 'fixes.week_id', '=', 'week.id')->where(['week.approved' => 0])->count() }} {{ trans('messages.near-user-fixes') }}</a>
            @endif
        </h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>{{ trans('messages.table-date') }}</th>
                <th>{{ trans('messages.table-day') }}</th>
                <th>{{ trans('messages.table-status') }}</th>
                <th>{{ trans('messages.table-earned') }}</th>
                <th>{{ trans('messages.table-worked') }}</th>
                <th></th><th></th>
            </tr>
            </thead>
            <tbody>
            <?php $total = 0; ?>
            @foreach($user->days()->select(['day.status as status', 'day.id as id', 'day.date as date', 'day.approved as approved', 'day.cancelled as cancelled'])->where(['submitted' => 1])->leftJoin('week', 'week.id', '=', 'day.week_id')->where('status', '<>', 'none')->where(['week.approved' => 0])->orderBy('date', 'DESC')->get() as $day)
                <?php $total += ($day->status == 'day' ? $day_fare : $night_fare) ?>
                <tr>
                    {!! Form::open([
                    'method' => '',
                    'action' => ['DayController@approve', $day->id]
                    ]) !!}
                    <td class="vert-align"><a href="{{ action('TimesheetController@byDate', ['date' => $day->date]) }}">{{ date('d/m/Y', strtotime($day->date)) }}</a></td>
                    <td class="vert-align"><strong>{{ trans('messages.days.'.date('l', strtotime($day->date))) }}</strong></td>
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
                        @if($day->approved || $day->cancelled)
                            {!! $day->status == 'day' ? '<i class="fa fa-sun-o text-warning"></i> '.trans('messages.day-shift') : '<i class="fa fa-moon-o text-primary"></i> '.trans('messages.night-shift') !!}
                        @else
                            <div class="row cursor-pointer">
                                {!! Form::checkbox('type', 'day', $day->status == 'day' ? true : null, ['class' => 'group_'.$day->id, 'id' => 'day_shift_'.$day->id]) !!}
                                <label for="day_shift_{{ $day->id }}"><i class="fa fa-sun-o text-warning"></i> {{ trans('messages.day-shift') }}</label>
                            </div>
                            <div class="row cursor-pointer">
                                {!! Form::checkbox('type', 'night', $day->status == 'night' ? true : null, ['class' => 'group_'.$day->id, 'id' => 'night_shift_'.$day->id]) !!}
                                <label for="night_shift_{{ $day->id }}"><i class="fa fa-moon-o text-primary"></i> {{ trans('messages.night-shift') }}</label>
                            </div>
                        @endif
                    </td>
                    {!! Form::hidden('id', $day->id) !!}
                    @if($day->approved || $day->cancelled)
                        <td colspan="2"></td>
                        {!! Form::close() !!}
                    @else
                        <td class="vert-align">
                            {!! Form::submit(trans('messages.button-approve'), ['class' => 'btn btn-success btn-medium']) !!}
                        </td>
                        {!! Form::close() !!}
                        <td class="vert-align">
                            {!! Form::open([
                            'class' => 'mb-0px',
                            'method' => '',
                            'action' => ['DayController@destroy', $day->id],
                            'onclick'=>'return confirm("'.trans('messages.are-you-sure').'")'
                            ]) !!}
                            {!! Form::submit(trans('messages.button-delete'), ['class' => 'btn btn-danger btn-medium']) !!}
                            {!! Form::close() !!}
                        </td>
                    @endif
                </tr>
            @endforeach
                <tr>
                    <td class="vert-align text-right" colspan="3">{{ trans('messages.total') }} </td>
                    <td class="vert-align" colspan="4"><strong>£ {{ $total }}</strong></td>
                </tr>
            </tbody>
        </table>
    @endif
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