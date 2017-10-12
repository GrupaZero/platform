@extends('layouts.master')

@section('title')
    @lang('common.welcome')
@stop

@section('content')
    <div class="col-md-4 col-md-offset-4 text-center">
        <h1 class="page-header">@lang('common.welcome')!</h1>
        <p class="lead">@lang('common.welcome_message')</p>
        <hr>
        <a href="{{ route('account') }}" class="btn btn-primary btn-lg btn-block mb20">
            @lang('user.my_account')
        </a>
        <a href="{{ route('home') }}" class="btn btn-default btn-lg btn-block">
            @lang('common.back_to_homepage')
        </a>
    </div>
@stop
