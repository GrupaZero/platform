@extends('emails.layouts.default')

@section('emailContent')
    <h1>@lang('emails.welcome.title')</h1>

    <p>
        @lang('emails.welcome.body', ["siteName" => option('general', 'siteName'), "domain" => config('gzero.domain')])
    </p>
@stop
