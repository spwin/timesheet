<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication routes...
Route::group(['middleware' => ['web']], function () {
    Route::group(['middleware' => ['auth']], function()
    {
        Route::resource('/', 'DefaultController');
        Route::resource('/profile', 'UserController');
        Route::group(['middleware' => ['role:admin']], function()
        {
            Route::resource('/managers', 'ManagerController');
            Route::resource('/settings', 'SettingsController');
            Route::get('/admin/timesheet', 'TimesheetController@admin');
            Route::get('/admin/timesheet/{id}/view', 'TimesheetController@view');
            Route::get('/admin/timesheet/{id}/by-days', 'TimesheetController@byDays');
            Route::get('/admin/timesheet/{id}/approve', 'WeekController@approve');
            Route::get('/admin/timesheet/{id}/only-fixes', 'TimesheetController@onlyFixes');
        });
        Route::group(['middleware' => ['role:manager']], function(){
            Route::get('/manager/timesheet/requests/{id}/user', 'TimesheetController@requestsUser');
            Route::get('/manager/timesheet/requests/users', 'TimesheetController@requestsUsers');
            Route::get('/manager/timesheet/requests/by-date', 'TimesheetController@requestsDays');
            Route::get('/manager/timesheet/by-date', 'TimesheetController@byDate');
            Route::get('/manager/timesheet/lists/{id}/user', 'TimesheetController@listsUser');
            Route::get('/manager/timesheet/lists/users', 'TimesheetController@managersUsers');
            Route::get('/manager/timesheet/lists/by-days', 'TimesheetController@managersDays');
            Route::post('/manager/timesheet/day/{id}/approve', 'DayController@approve');
            Route::post('/manager/timesheet/day/{id}/destroy', 'DayController@destroy');
            Route::resource('/manager/fixes', 'FixesController');
            Route::get('/manager/fixes/{week_id}/create', 'FixesController@create');
            Route::get('/manager/fixes/{week_id}/weekly', 'FixesController@weekly');
            Route::get('/manager/fixes/{user_id}/user', 'FixesController@managerUsers');
        });
        Route::group(['middleware' => ['role:advanced']], function()
        {
            Route::resource('/users', 'UsersController');
        });
        Route::get('/user/timesheet', 'TimesheetController@users');
        Route::post('/user/timesheet/day/{id}/update', 'DayController@update');

        Route::get('/test', 'DefaultController@test');
    });

    Route::get('language/{lang}', 'DefaultController@language');

    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', 'Auth\AuthController@postLogin');
    Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
    Route::get('register', 'Auth\AuthController@getRegister');
    Route::post('register', 'Auth\AuthController@postRegister');

    Route::controllers([
        'password' => 'Auth\PasswordController',
    ]);
});
