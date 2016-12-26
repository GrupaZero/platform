@extends('layouts.withoutBlocks')

@section('title')
    @lang('common.register')
@stop

@section('content')
    <div class="col-md-4 col-md-offset-4">
        <h1 class="page-header">@lang('common.register')</h1>

        <form id="register-account-form" method="POST" role="form" action="{{ route('register') }}">
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
            <div class="form-group{{ $errors->has('nick') ? ' has-error' : '' }}">
                <label class="control-label" for="nick">@lang('common.nick')</label>
                <input id="nick" type="text" class="form-control" name="nick"
                       value="{{old('nick')}}"
                       placeholder="@lang('common.nick')"
                       required>
                @if($errors->has('nick'))
                    <p class="help-block">{{ $errors->first('nick') }}</p>
                @endif
            </div>
            <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                <label class="control-label" for="firstName">@lang('common.first_name')</label>
                <input id="firstName" type="text" class="form-control" name="firstName"
                       value="{{old('firstName')}}"
                       placeholder="@lang('common.first_name') (@lang('common.optional'))">
                @if($errors->has('firstName'))
                    <p class="help-block">{{ $errors->first('firstName') }}</p>
                @endif
            </div>
            <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                <label class="control-label" for="lastName">@lang('common.last_name')</label>
                <input id="lastName" type="text" class="form-control" name="lastName"
                       value="{{old('lastName')}}"
                       placeholder="@lang('common.last_name') (@lang('common.optional'))">
                @if($errors->has('lastName'))
                    <p class="help-block">{{ $errors->first('lastName') }}</p>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="control-label" for="password">@lang('common.password')</label>
                <input id="password" type="password" class="form-control" name="password"
                       placeholder="@lang('common.password')" required>
                @if($errors->has('password'))
                    <p class="help-block">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block">
                    @lang('common.register')
                </button>
            </div>
            <input id="accountIntent" type="text" name="accountIntent" class="hidden">
        </form>
        @if(isProviderLoaded('Gzero\Social\ServiceProvider'))
            @include('gzero-social::includes.socialLogin')
        @endif
    </div>
@endsection
