@extends('gzero-core::layouts.master')

@section('title')
    Bartero app
@stop

@section('content')
    <div id="app">
        <admin-panel :apps="apps"></admin-panel>
    </div>
@stop

@section('footerScripts')
    @parent
@stop