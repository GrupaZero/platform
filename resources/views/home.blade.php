@extends('gzero-core::layouts.withRegions')

@section('bodyClass', 'home')

@section('header')
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Page example</h1>
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

@section('mainContent')
    @if(!empty($blocks['homepage']))
        <section id="homepage-region" class="block-region clearfix container-fluid mb-4">
            <div class="row">
                @foreach($blocks['homepage'] as $index => $block)
                    {!! $block->view() !!}
                @endforeach
            </div>
        </section>
    @endif
    @parent
@stop

@section('content')
    @if(!empty($contents))
        @foreach($contents as $index => $content)
            @include('gzero-cms::contents._article', ['child' => $content])
        @endforeach
        {!! $contents->render() !!}
    @endif
    <div class="w-100 my-4"></div>
@stop


