@extends('gzero-core::layouts.withRegions')

@section('header')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Album example</h1>
            <p class="lead text-muted">Something short and leading about the collection below—its contents, the
                creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it
                entirely.
            </p>
            @guest
                <p>
                    <a href="{{route('login')}}" class="btn btn-primary">@lang('gzero-core::common.login')</a>
                    <a href="{{route('register')}}" class="btn btn-secondary"> @lang('gzero-core::common.register')</a>
                </p>
            @endguest
        </div>

        @unless (Auth::check())
            You are not signed in.
        @endunless

        @auth
            <p>
                {{ Auth::user()->name }}
            </p>
            <p>
                <a href="{{route('account')}}" class="btn btn-primary">@lang('gzero-core::common.account')</a>
                <a href="{{route('logout')}}" class="btn btn-secondary">@lang('gzero-core::common.logout')</a>
            </p>
        @endauth

    </section>
@stop

{{--@section('sidebarLeft')--}}
{{--HOME LEFT--}}
{{--@stop--}}

@section('content')
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur corporis cupiditate dignissimos distinctio
    dolorem dolores error est eum, explicabo illo in iste laboriosam nemo provident quam quia reprehenderit saepe
    tenetur?
@stop

{{--@section('sidebarRight')--}}
{{--HOME RIGHT--}}
{{--@stop--}}


