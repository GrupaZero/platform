@extends('layouts.withoutBlocks')

@section('title')
    @lang('common.login')
@stop

@section('content')
    <div class="col-md-4 col-md-offset-4">
        <h1 class="page-header">@lang('common.login')</h1>

        <form role="form" method="POST" action="{{ route('post.login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="control-label" for="email">@choice('common.email', 1)</label>
                <input id="email" type="email" class="form-control" name="email"
                       value="{{ old('email') }}"
                       placeholder="@choice('common.email', 1)"
                       required autofocus>
                @if ($errors->has('email'))
                    <p class="help-block">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">@lang('common.password')</label>
                <input id="password" type="password" class="form-control" name="password"
                       placeholder="@lang('common.password')"
                       required>
                @if ($errors->has('password'))
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
                            <a href="{{ route('password.reset') }}">@lang('common.forgotPassword')</a>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">
                @lang('common.login')
            </button>
        </form>
        @if(isProviderLoaded('Gzero\Social\ServiceProvider'))
            @include('gzero-social::includes.socialLogin')
        @endif
        <hr/>
        <div class="text-center">
            @lang('common.notAMember') <a href="{{ route('register') }}"> @lang('common.register')</a>
        </div>
    </div>
@endsection
