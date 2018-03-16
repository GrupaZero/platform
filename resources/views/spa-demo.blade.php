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
    @if (file_exists(public_path('/js/manifest.js')))
        <script src="{{ mix('/js/manifest.js') }}"></script>
    @endif
    @if (file_exists(public_path('/js/vendor.js')))
        <script src="{{ mix('/js/vendor.js') }}"></script>
    @endif
    @if (file_exists(public_path('/js/admin.js')))
        <script src="{{ mix('/js/admin.js') }}"></script>
    @endif
@stop
