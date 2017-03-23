@extends('layouts.sidebarLeft')

@section('title')
    @lang('common.account')
@stop

@section('sidebarLeft')
    @include('account.menu')
@stop

@section('content')
    <h1 class="page-header">@lang('user.oauth')</h1>

    <passport-clients></passport-clients>
    <passport-authorized-clients></passport-authorized-clients>
    <passport-personal-access-tokens></passport-personal-access-tokens>
@stop
