@extends('layout')
@section('body')
    @include('pages.admin.navbar')
    @include('flash::message')
    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @foreach($settings as $setting)
                            {!! Form::model($setting, [
                           'method' => 'PATCH',
                           'action' => ['SettingsController@update', $setting->id],
                           'class' => 'form-horizontal'
                           ]) !!}
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="form-group">
                                    <label class="col-md-3 control-label">{{ trans('messages.setting-'.$setting->name) }}</label>
                                    <div class="col-md-6">
                                        {!! Form::text('value', null, ['class' => 'form-control']) !!}
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn stn-success inline-block btn-sm btn-success btn-group-sm">{{ trans('messages.button-update-info') }}</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection