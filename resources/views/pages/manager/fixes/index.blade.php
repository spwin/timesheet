@extends('layout')
@section('body')
    @include('pages.manager.navbar')
    @include('flash::message')
    <h2>Select week for fixes</h2>
    <table class="table table-hover">
        <thead>
        <tr>
            <th></th>
            <th>BEGINS</th>
            <th>ENDS</th>
            <th>FIXES</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($weeks as $week)
            <tr>
                <td class="vert-align">Week</td>
                <td class="vert-align">{{ $week->begin_date }}</td>
                <td class="vert-align">{{ $week->end_date }}</td>
                <td class="vert-align">{{ $week->fixes()->count() }}</td>
                <td class="vert-align">
                    <a href="{{ action('FixesController@create', $week->id) }}" class="btn btn-success">Add fix for this week</a>
                    <a href="{{ action('FixesController@weekly', $week->id) }}"  class="btn btn-warning">Show fixes</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection