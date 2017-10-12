@extends('layouts.master')

@section('title')
    @lang('common.password_reset')
@stop

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-4">
            <h1 class="page-header">@lang('common.password_reset')</h1>

            <form role="form" method="POST" action="{{ route('post.password.reset') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <label for="email" class="control-label">@choice('common.email', 1)</label>
                    <input id="email" type="email" name="email" value="{{ $email or old('email') }}"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           required autofocus>

                    @if ($errors->has('email'))
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">@lang('common.password')</label>
                    <input id="password" type="password" name="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           required>

                    @if ($errors->has('password'))
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password-confirm" class="control-label">@lang('common.password_confirm')</label>
                    <input id="password-confirm" type="password" name="password_confirmation"
                           class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                           required>

                    @if ($errors->has('password_confirmation'))
                        <div class="invalid-feedback">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        @lang('common.password_reset')
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
