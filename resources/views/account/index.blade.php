@extends('layouts.sidebarLeft')

@section('title')
    @lang('common.account')
@stop

@section('sidebarLeft')
    @include('account.menu', ['menu' => $menu])
@stop

@section('content')
    <h1 class="page-header">@lang('user.my_account')</h1>

    <h3>{{ $user->firstName }} {{ $user->lastName }}</h3>

    @if(App::bound('oauth') && strpos($user->email,'social_') !== false)
        <p>@lang('common.accountConected')</p>
    @else
        <p><strong>@choice('common.email', 1):</strong> {{ $user->email }}</p>
    @endif

    <a href="{{ URL::route('account.edit') }}" title="@lang('user.edit_account')" class="btn btn-primary">
        @lang('user.edit_account')
    </a>

    <a href="{{ URL::route('logout') }}" title="@lang('common.logout')" class="btn btn-danger">
        @lang('common.logout')
    </a>
@stop
