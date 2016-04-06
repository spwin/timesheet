@extends('layout')
@section('body')
    @include('pages.admin.navbar')
    @include('flash::message')
    <h2>Week</h2>
    <p>{{ date('d/m/Y', strtotime($week->begin_date)) }} - {{ date('d/m/Y', strtotime($week->end_date)) }}</p>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation"><a href="{{ action('TimesheetController@view', $week->id) }}">By user</a></li>
        <li role="presentation" class="active"><a href="{{ action('TimesheetController@byDays', $week->id) }}">By day</a></li>
        <li role="presentation"><a href="{{ action('TimesheetController@onlyFixes', $week->id) }}">Only fixes</a></li>
    </ul>
    @foreach($days as $single)
        <?php $total = 0; ?>
        <?php $users = 0; ?>
        <h2>{{ date('l', strtotime($single['current']->date)) }} ({{ date('d/m/Y', strtotime($single['current']->date)) }})</h2>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>USER</th>
                <th>Status</th>
                <th>Worked</th>
                <th>Earned</th>
            </tr>
            </thead>
        @foreach($single['days'] as $day)
            <?php $total += $day->cancelled == 0 ? ($day->status == 'day' ? $day_fare : $night_fare) : 0; ?>
            <tbody>
            {!! Form::open([
                            'method' => '',
                            'action' => ['DayController@approve', $day->id]
                            ]) !!}
            <tr>
                <td><?php $users++; ?>{{ $users }}</td>
                <td class="vert-align">{{ $day->user()->first()->name }} {{ $day->user()->first()->surname }}</td>
                <td class="vert-align">
                    {!! $day->status == 'none' ?
                                    '<span class="label label-warning">Not submitted</span>' :
                                    ($day->approved ? '<span class="label label-success">Approved</span>' :
                                    ($day->cancelled ? '<span class="label label-danger">Cancelled</span>' :
                                    '<span class="label label-info">Waiting to be approved</span>')) !!}
                </td>
                <td class="vert-align">
                    {!! $day->status == 'day' ? '<i class="fa fa-sun-o text-warning"></i> Day shift' : '<i class="fa fa-moon-o text-primary"></i> Night shift' !!}
                </td>
                <td class="vert-align">
                    <strong>£ {{ $day->cancelled == 0 ? ($day->status == 'day' ? $day_fare : $night_fare) : 0 }}</strong>
                </td>
                {!! Form::hidden('id', $day->id) !!}
                {!! Form::close() !!}
            </tr>
        @endforeach
            <tr>
                <td class="vert-align text-right" colspan="4">TOTAL: </td>
                <td class="vert-align"><strong>£ {{ $total }}</strong></td>
            </tr>
            </tbody>
        </table>
    @endforeach
@endsection
@push('scripts')
<script>
    $(function() {
        $( "#date" ).datepicker({ dateFormat: 'yy-mm-dd' });
    });
</script>
@endpush