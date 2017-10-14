@extends('gzero-base::layouts.master')

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
                <a href="{{route('login')}}" class="btn btn-primary">@lang('common.login')</a>
                <a href="{{route('register')}}" class="btn btn-secondary"> @lang('common.register')</a>
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
            <a href="{{route('logout')}}" class="btn btn-secondary">@lang('common.logout')</a>
        </p>
        <p>
            <a href="{{route('account')}}" class="btn btn-secondary">@lang('common.account')</a>
        </p>
        @endauth

    </section>
@stop


{{--@component('sections.sidebarLeft', ['blocks' => $blocks, 'class' => 'col-sm-6'])--}}
    {{--MY CUSTOM SIDEBAR FROM HOME--}}
{{--@endcomponent--}}

{{--@component('sections.content', ['class' => 'col-sm-6'])--}}
    {{--MY CUSTOM CONTENT FROM HOME--}}
{{--@endcomponent--}}

@section('sidebarLeft')
    HOME LEFT
@stop

@section('content')
    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur corporis cupiditate dignissimos distinctio
    dolorem dolores error est eum, explicabo illo in iste laboriosam nemo provident quam quia reprehenderit saepe
    tenetur?
@stop

@section('sidebarRight')
    HOME RIGHT
@stop


