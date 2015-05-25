@extends('layouts.default')

@section('title')
    @lang('common.passwordReset')
@stop

@section('content')
    <div class="col-md-4 col-md-offset-4">
        <h1 class="page-header">@lang('common.passwordReset')</h1>

        <form action="{{ URL::route('post.password.reset') }}" method="POST" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="token" value="{{ $token }}">
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
                <label class="control-label" for="password">@lang('common.newPassword')</label>
                <input type="password" id="password" name="password" class="form-control"
                       placeholder="@lang('common.newPassword')">
                @if($errors->first('password'))
                    <p class="help-block">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="form-group{{ $errors->first('password_confirmation') ? ' has-error' : '' }}">
                <label class="control-label" for="passwordConfirmation">@lang('common.passwordRepeat')</label>
                <input type="password" id="passwordConfirmation" name="password_confirmation" class="form-control"
                       placeholder="@lang('common.passwordRepeat')">
                @if($errors->first('password_confirmation'))
                    <p class="help-block">{{ $errors->first('password_confirmation') }}</p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">@lang('common.passwordReset')</button>
        </form>
    </div>
@stop
