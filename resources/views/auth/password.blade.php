@extends('layouts.default')

@section('title')
    @lang('common.forgotPassword')
@stop

@section('content')
    <div class="col-md-4 col-md-offset-4">
        <h1 class="page-header">@lang('common.forgotPassword')</h1>

        <p>@lang('common.forgotPasswordHint')</p>
        <form action="{{ URL::route('post.password.remind') }}" method="POST" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group{{ $errors->first('email') ? ' has-error' : '' }}">
                <label class="control-label" for="email">@choice('common.email', 1)</label>
                <input type="email" id="email" name="email" class="form-control"
                       value="{{Input::old('email')}}"
                       placeholder="@choice('common.email', 1)">
                @if($errors->first('email'))
                    <p class="help-block">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">@lang('common.send')</button>
        </form>
        <div class="text-center">
            <hr/>
            <a href="{{ URL::route('login') }}">@lang('common.returnToSignIn')</a>
        </div>
    </div>
@stop
