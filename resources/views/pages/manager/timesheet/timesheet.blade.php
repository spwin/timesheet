@extends('layout')
@section('body')
    @include('pages.manager.navbar')
    @include('flash::message')
    <h1>{{ $type == 'pending' ? 'Pending working times' : 'All working times' }}</h1>
    <?php $total = 0; ?>
    @foreach($users as $user)
        @if($type == 'all' || $user->days()->where($where)->where('status', '<>', 'none')->count() > 0)
            <?php $total++; ?>
            <h2>{{ $user->surname.' '.$user->name }}</h2>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Day</th>
                    <th>Status</th>
                    <th>Earned</th>
                    <th>Worked</th>
                    <th></th><th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($user->days()->select(['day.status as status', 'day.id as id', 'day.date as date', 'day.approved as approved', 'day.cancelled as cancelled'])->where($where)->leftJoin('week', 'week.id', '=', 'day.week_id')->where('week.approved', '=', 0)->where('status', '<>', 'none')->orderBy('date', 'DESC')->get() as $day)
                    <tr>
                        {!! Form::open([
                        'method' => '',
                        'action' => ['DayController@approve', $day->id]
                        ]) !!}
                        <td class="vert-align"><a href="{{ action('TimesheetController@byDate', ['date' => $day->date]) }}">{{ date('d/m/Y', strtotime($day->date)) }}</a></td>
                        <td class="vert-align"><strong>{{ date('l', strtotime($day->date)) }}</strong></td>
                        <td class="vert-align">
                            {!! $day->status == 'none' ?
                                '<span class="label label-warning">Not submitted</span>' :
                                ($day->approved ? '<span class="label label-success">Approved</span>' :
                                ($day->cancelled ? '<span class="label label-danger">Cancelled</span>' :
                                '<span class="label label-info">Waiting to be approved</span>')) !!}
                        </td>
                        <td class="vert-align">
                            <strong>{{ $day->approved ? ($day->status == 'day' ? '£ '.$day_fare : '£ '.$night_fare) : '--' }}</strong>
                        </td>
                        <td class="vert-align">
                            @if($day->approved || $day->cancelled)
                                {{ $day->status == 'day' ? 'Day shift' : 'Night shift' }}
                            @else
                                <div class="row cursor-pointer">
                                    {!! Form::checkbox('type', 'day', $day->status == 'day' ? true : null, ['class' => 'group_'.$day->id, 'id' => 'day_shift_'.$day->id]) !!}
                                    <label for="day_shift_{{ $day->id }}">Day shift</label>
                                </div>
                                <div class="row cursor-pointer">
                                    {!! Form::checkbox('type', 'night', $day->status == 'night' ? true : null, ['class' => 'group_'.$day->id, 'id' => 'night_shift_'.$day->id]) !!}
                                    <label for="night_shift_{{ $day->id }}">Night shift</label>
                                </div>
                            @endif
                        </td>
                        {!! Form::hidden('id', $day->id) !!}
                        @if($day->approved || $day->cancelled)
                            <td colspan="2"></td>
                            {!! Form::close() !!}
                        @else
                            <td class="vert-align">
                                {!! Form::submit('Approve', ['class' => 'btn btn-success btn-medium']) !!}
                            </td>
                            {!! Form::close() !!}
                            <td class="vert-align">
                                {!! Form::open([
                                'class' => 'mb-0px',
                                'method' => '',
                                'action' => ['DayController@destroy', $day->id],
                                'onclick'=>'return confirm("Are you sure?")'
                                ]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-medium']) !!}
                                {!! Form::close() !!}
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    @endforeach
    @if($total == 0)
        There are no pending days. <a href="{{ action('TimesheetController@managers', ['type' => 'all']) }}">See all</a>
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