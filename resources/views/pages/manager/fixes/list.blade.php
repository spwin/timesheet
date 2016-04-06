@extends('layout')
@section('body')
    @include('pages.manager.navbar')
    @include('flash::message')
    <h2>Fixes list for week ({{ date('d/m/Y', strtotime($week->begin_date)).' - '.date('d/m/Y', strtotime($week->end_date)) }})</h2>
    <a href="{{ action('FixesController@index') }}" class="block mb-20px" style="margin-top: 20px;"><i class="fa fa-arrow-circle-o-left"></i> Back to weeks</a>
    <a href="{{ action('FixesController@create', $week->id) }}" class="inline-block btn btn-success mb-20px">Add fix for this week</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>User</th>
            <th>Sum</th>
            <th>Comment</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($fixes as $fix)
            <tr>
                <td class="vert-align">{{ $fix->id }}</td>
                <td class="vert-align"><a href="{{ action('FixesController@managerUsers', $fix->user()->first()->id) }}">{{ $fix->user()->first()->surname.' '.$fix->user()->first()->name }}</a></td>
                <td class="vert-align">{{ '£ '. $fix->sum }}</td>
                <td class="vert-align width-300px">{{ $fix->comment }}</td>
                <td class="vert-align">
                    <a href="{{ action('FixesController@edit', $fix->id) }}" class="btn btn-success">Edit</a>
                    <a href="" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection