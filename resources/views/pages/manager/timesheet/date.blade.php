@extends('layout')
@section('body')
    @include('pages.manager.navbar')
    @include('flash::message')
    <?php $total = 0; ?>
    {!! Form::open([
                    'action' => array('TimesheetController@byDate'),
                    'role' => 'form',
                    'method' => 'get'
                    ]) !!}
        {!! Form::text('date', $date, ['id' => 'date', 'class' => 'ml-10px form-control inline-block', 'style' => 'width: 160px;']) !!}
        {!! Form::submit('Change day', ['class' => 'btn btn-primary btn-medium']) !!}
    {!! Form::close() !!}
    <h2><a href="{{ action('TimesheetController@byDate', ['date' => $single->date]) }}">{{ date('l', strtotime($single->date)) }} ({{ date('d/m/Y', strtotime($single->date)) }})</a></h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>USER</th>
            <th>Status</th>
            <th>Worked</th>
            <th>Earned</th>
            <th></th>
        </tr>
        </thead>
    @foreach($days as $day)
        <?php $total += ($day->status == 'day' ? $day_fare : $night_fare) ?>
        <tbody>
        {!! Form::open([
                        'method' => '',
                        'action' => ['DayController@approve', $day->id]
                        ]) !!}
        <tr>
            <td class="vert-align"><a href="{{ action('TimesheetController@listsUser', ['id' => $day->user()->first()->id]) }}">{{ $day->user()->first()->name }} {{ $day->user()->first()->surname }}</a></td>
            <td class="vert-align">
                {!! $day->status == 'none' ?
                                '<span class="label label-warning">Not submitted</span>' :
                                ($day->approved ? '<span class="label label-success">Approved</span>' :
                                ($day->cancelled ? '<span class="label label-danger">Cancelled</span>' :
                                '<span class="label label-info">Waiting to be approved</span>')) !!}
            </td>
            <td class="vert-align">
                @if($day->approved || $day->cancelled)
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
            <td class="vert-align">
                <strong>£ {{ $day->status == 'day' ? $day_fare : $night_fare }}</strong>
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
        <tr>
            <td class="vert-align text-right" colspan="3">TOTAL: </td>
            <td class="vert-align"><strong>£ {{ $total }}</strong></td>
        </tr>
        </tbody>
    </table>
@endsection
@push('scripts')
<script>
    $(function() {
        $( "#date" ).datepicker({
            dateFormat: 'yy-mm-dd',
            minDate: new Date('{{ $first_date->begin_date }}'),
            maxDate: '0'
        });
    });
</script>
@endpush