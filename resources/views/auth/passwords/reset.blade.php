@extends('layouts.withoutBlocks')

@section('title')
    @lang('common.passwordReset')
@stop

@section('content')
    <div class="col-md-4 col-md-offset-4">
        <h1 class="page-header">@lang('common.passwordReset')</h1>

        <form class="form-horizontal" role="form" method="POST" action="{{ route('post.password.reset') }}">
            {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="control-label">@choice('common.email', 1)</label>
                <input id="email" type="email" class="form-control" name="email"
                       value="{{ $email or old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <p class="help-block">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">@lang('common.password')</label>
                <input id="password" type="password" class="form-control" name="password" required>

                @if ($errors->has('password'))
                    <p class="help-block">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label for="password-confirm" class="control-label">@lang('common.passwordConfirm')</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                @if ($errors->has('password_confirmation'))
                    <p class="help-block">{{ $errors->first('password_confirmation') }}/p>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    @lang('common.passwordReset')
                </button>
            </div>
        </form>
    </div>
@endsection
