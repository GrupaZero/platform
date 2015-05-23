@extends('emails.layouts.default')

@section('emailContent')
    <h1>@lang('emails.welcome.title')</h1>

    <p>
        @lang('emails.welcome.body', ["siteName" => Config::get('gzero.siteName'), "domain" => Config::get('gzero.domain')])
    </p>
@stop
