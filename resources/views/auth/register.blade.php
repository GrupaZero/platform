@extends('layouts.default')

@section('title')
    @lang('common.register')
@stop

@section('content')
    <div class="col-md-4 col-md-offset-4">
        <h1 class="page-header">@lang('common.register')</h1>

        <form id="register-account-form" method="POST" role="form">
            <div class="form-group{{ $errors->first('email') ? ' has-error' : '' }}">
                <label class="control-label" for="email">@choice('common.email', 1)</label>
                <input type="email" id="email" name="email" class="form-control"
                       value="{{Input::old('email')}}"
                       placeholder="@choice('common.email', 1)">
                @if($errors->first('email'))
                    <p class="help-block">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="form-group{{ $errors->first('firstName') ? ' has-error' : '' }}">
                <label class="control-label" for="firstName">@lang('common.firstName')</label>
                <input type="text" id="firstName" name="firstName" class="form-control"
                       value="{{Input::old('firstName')}}"
                       placeholder="@lang('common.firstName')">
                @if($errors->first('firstName'))
                    <p class="help-block">{{ $errors->first('firstName') }}</p>
                @endif
            </div>
            <div class="form-group{{ $errors->first('lastName') ? ' has-error' : '' }}">
                <label class="control-label" for="lastName">@lang('common.lastName')</label>
                <input type="text" id="lastName" name="lastName" class="form-control"
                       value="{{Input::old('lastName')}}"
                       placeholder="@lang('common.lastName')">
                @if($errors->first('lastName'))
                    <p class="help-block">{{ $errors->first('lastName') }}</p>
                @endif
            </div>
            <div class="form-group{{ $errors->first('password') ? ' has-error' : '' }}">
                <label class="control-label" for="password">@lang('common.password')</label>
                <input type="password" id="password" name="password" class="form-control"
                       placeholder="@lang('common.password')">
                @if($errors->first('password'))
                    <p class="help-block">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="form-group">
                <button id="edit-account" type="submit" class="btn btn-primary btn-lg btn-block">@lang('common.register')</button>
            </div>
            <input id="accountIntent" type="text" name="accountIntent" class="hidden">
        </form>
        @if(App::bound('oauth'))
            @include('includes.socialLogin')
        @endif
    </div>
@stop
