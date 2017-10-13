@extends('layouts.master')

@section('title')
    @lang('common.register')
@stop

@section('content')
    <div class="row justify-content-md-center">
        <div class="col-md-4">
            <h1 class="page-header">@lang('common.register')</h1>

            <form id="register-account-form" method="POST" role="form" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label class="control-label" for="email">@choice('common.email', 1)</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           placeholder="@choice('common.email', 1)" required autofocus>
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">@lang('common.nick')</label>
                    <input id="name" type="text" name="name" value="{{old('name')}}"
                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                           placeholder="@lang('common.nick')" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label" for="first_name">@lang('common.first_name')</label>
                    <input id="first_name" type="text" name="first_name" value="{{old('first_name')}}"
                           class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                           placeholder="@lang('common.first_name') (@lang('common.optional'))">
                    @if($errors->has('first_name'))
                        <div class="invalid-feedback">{{ $errors->first('first_name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label" for="last_name">@lang('common.last_name')</label>
                    <input id="last_name" type="text" name="last_name" value="{{old('last_name')}}"
                           class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                           placeholder="@lang('common.last_name') (@lang('common.optional'))">
                    @if($errors->has('last_name'))
                        <div class="invalid-feedback">{{ $errors->first('last_name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label" for="password">@lang('common.password')</label>
                    <input id="password" type="password" name="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           placeholder="@lang('common.password')" required>
                    @if($errors->has('password'))
                        <div class="invalid-feedback">{{ $errors->first('password') }}</div>
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
    </div>
@endsection
