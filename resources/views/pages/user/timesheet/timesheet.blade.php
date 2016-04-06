@extends('layout')
@section('body')
    @include('pages.user.navbar')
    @include('flash::message')
    @foreach($weeks as $week)
        <h2>Week</h2>
        <p>({{ date('d/m/Y', strtotime($week->begin_date)).' - '.date('d/m/Y', strtotime($week->end_date)) }})</p>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Date</th>
                <th>Day</th>
                <th>Status</th>
                <th>Earned</th>
                <th>Worked</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $total_week = 0; ?>
            @foreach($week->days()->where(['user_id' => $user->id])->orderBy('date', 'DESC')->get() as $day)
                <tr>
                    {!! Form::open([
                    'method' => '',
                    'action' => ['DayController@update', $day->id]
                    ]) !!}
                        <td class="vert-align">{{ date('d/m/Y', strtotime($day->date)) }}</td>
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
                            @if($day->approved)
                                {!! $day->status == 'day' ? '<i class="fa fa-sun-o text-warning"></i> Day shift' : '<i class="fa fa-moon-o text-primary"></i> Night shift' !!}
                            @else
                                <div class="row cursor-pointer">
                                    {!! Form::checkbox('type', 'day', $day->status == 'day' ? true : null, ['class' => 'group_'.$day->id, 'id' => 'day_shift_'.$day->id]) !!}
                                    <label for="day_shift_{{ $day->id }}"><i class="fa fa-sun-o text-warning"></i> Day shift</label>
                                </div>
                                <div class="row cursor-pointer">
                                    {!! Form::checkbox('type', 'night', $day->status == 'night' ? true : null, ['class' => 'group_'.$day->id, 'id' => 'night_shift_'.$day->id]) !!}
                                    <label for="night_shift_{{ $day->id }}"><i class="fa fa-moon-o text-primary"></i> Night shift</label>
                                </div>
                            @endif
                        </td>
                        {!! Form::hidden('id', $day->id) !!}
                        <td class="vert-align">
                            @if($day->submitted && $day->status != 'none')
                                @if(!$day->approved)
                                    {!! Form::submit('Resubmit', ['class' => 'btn btn-warning btn-medium']) !!}
                                @else
                                    <?php $total_week += ($day->status == 'day' ? $day_fare : $night_fare) ?>
                                @endif
                            @else
                                {!! Form::submit('Submit', ['class' => 'btn btn-success btn-medium']) !!}
                            @endif
                        </td>
                    {!! Form::close() !!}
                </tr>
            @endforeach
            @foreach($user->fixes()->where(['week_id' => $week->id])->get() as $fix)
                <tr>
                    <td class="vert-align">FIX</td>
                    <td class="vert-align text-left width-300px" colspan="2"><strong>Comment: </strong>{{ $fix->comment }}</td>
                    <td class="vert-align" colspan=3"><strong>£ {{ $fix->sum + 0 }}</strong></td>
                </tr>
                <?php $total_week += $fix->sum; ?>
            @endforeach
            @if($total_week > 0)
                <tr>
                    <td colspan="3" class="text-right">TOTAL:</td>
                    <td><strong>£ {{ $total_week }}</strong></td>
                    <td colspan="2"></td>
                </tr>
            @endif
            </tbody>
        </table>
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