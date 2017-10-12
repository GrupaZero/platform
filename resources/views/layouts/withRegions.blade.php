@extends('layouts.master')


@isset($blocks)
    @component('sidebarLeft', ['blocks' => $blocks])
        @yield('sidebarLeft')
    @endcomponent
@endisset


@component('content', ['class'=> isset($blocks) ? 'col-sm-4' : 'col-sm-12'])
    @yield('content')
@endcomponent

@isset($blocks)
    @component('sidebarRight')
        @yield('sidebarRight')
    @endcomponent
@endisset
