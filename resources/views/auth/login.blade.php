@extends('layouts.default')

@section('title')
    @lang('common.login')
@stop

@section('content')
    <div class="col-md-4 col-md-offset-4">
        <h1 class="page-header">@lang('common.login')</h1>

        <form method="POST" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group{{ $errors->first('email') ? ' has-error' : '' }}">
                <label class="control-label" for="email">@choice('common.email', 1)</label>
                <input type="email" id="email" name="email" class="form-control"
                       value="{{old('email')}}"
                       placeholder="@choice('common.email', 1)">
                @if($errors->first('email'))
                    <p class="help-block">{{ $errors->first('email') }}</p>
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
                <div class="row">
                    <div class="col-sm-6">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" checked="true">@lang('common.remember')
                            </label>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="checkbox text-right">
                            <a href="{{ route('password.remind') }}">@lang('common.forgotPassword')</a>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">@lang('common.login')</button>
        </form>
        @if(isProviderLoaded('Gzero\Social\ServiceProvider'))
            @include('gzero-social::includes.socialLogin')
        @endif
        <hr/>
        <div class="text-center">
            @lang('common.notAMember') <a href="{{ route('register') }}"> @lang('common.register')</a>
        </div>
    </div>
@stop
