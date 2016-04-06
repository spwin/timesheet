<?php $pending = Helper::pending(); ?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ action('DefaultController@index') }}">Constructions</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li {{ (Request::is('*manager/timesheet/requests*') ? 'class=active' : '') }}><a href="{{ action('TimesheetController@requestsUsers') }}">Urgent requests {!! $pending ? "<span class='badge' style='background-color: red;'>{$pending}</span>" : '' !!}</a></li>
                <li {{ (Request::is('*manager/timesheet/lists*') ? 'class=active' : '') }}><a href="{{ action('TimesheetController@managersUsers') }}">Timesheet</a></li>
                <li {{ (Request::is('*manager/timesheet/by-date*') ? 'class=active' : '') }}><a href="{{ action('TimesheetController@byDate', ['date' => date('Y-m-d', time())]) }}">Check by date</a></li>
                <li {{ (Request::is('*manager/fixes*') ? 'class=active' : '') }}><a href="{{ action('FixesController@index') }}">Fixes</a></li>
                <li {{ (Request::is('users*') ? 'class=active' : '') }}><a href="{{ action('UsersController@index') }}">Users</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><span><strong>{{ Auth::user()->name }} {{ Auth::user()->surname }}</strong></span></li>
                <li {{ (Request::is('*profile*') ? 'class=active' : '') }}><a href="{{ action('UserController@index') }}">Profile</a></li>
                <li><a href="{{ action('Auth\AuthController@getLogout') }}">Logout</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>