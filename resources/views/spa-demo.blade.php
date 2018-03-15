@extends('gzero-core::layouts.master')

@section('title')
    SPA Demo app
@stop

@section('content')
    <div id="app">
        <admin-panel :apps="apps"></admin-panel>
    </div>
@stop

@section('footerScripts')
    @parent
@stop