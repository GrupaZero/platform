@extends('layouts.master')

@isset($blocks)
    @component('sections.sidebarLeft', ['blocks' => $blocks])
        @yield('sidebarLeft')
    @endcomponent
@endisset

@component('sections.content', ['class'=> isset($blocks) ? 'col-sm-4' : 'col-sm-12'])
    @yield('content')
@endcomponent

@isset($blocks)
    @component('sections.sidebarRight')
        @yield('sidebarRight')
    @endcomponent
@endisset
