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
                       required>
                @if ($errors->has('email'))
                    <p class="help-block">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="form-group{{ $errors->has('nickName') ? ' has-error' : '' }}">
                <label class="control-label" for="nickName">@lang('common.nickName')</label>
                <input id="nickName" type="text" class="form-control" name="nickName"
                       value="{{old('nickName')}}"
                       placeholder="@lang('common.nickName')">
                @if($errors->has('nickName'))
                    <p class="help-block">{{ $errors->first('nickName') }}</p>
                @endif
            </div>
            <div class="form-group{{ $errors->has('firstName') ? ' has-error' : '' }}">
                <label class="control-label" for="firstName">@lang('common.firstName')</label>
                <input id="firstName" type="text" class="form-control" name="firstName"
                       value="{{old('firstName')}}"
                       placeholder="@lang('common.firstName') (@lang('common.optional'))">
                @if($errors->has('firstName'))
                    <p class="help-block">{{ $errors->first('firstName') }}</p>
                @endif
            </div>
            <div class="form-group{{ $errors->has('lastName') ? ' has-error' : '' }}">
                <label class="control-label" for="lastName">@lang('common.lastName')</label>
                <input id="lastName" type="text" class="form-control" name="lastName"
                       value="{{old('lastName')}}"
                       placeholder="@lang('common.lastName') (@lang('common.optional'))">
                @if($errors->has('lastName'))
                    <p class="help-block">{{ $errors->first('lastName') }}</p>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="control-label" for="password">@lang('common.password')</label>
                <input id="password" type="password" class="form-control" name="password"
                       placeholder="@lang('common.password')">
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
