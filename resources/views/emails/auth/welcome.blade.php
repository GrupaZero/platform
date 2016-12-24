@extends('emails.layouts.default')

@section('emailContent')
    <h1>@lang('emails.welcome.title')</h1>

    <p>
        @lang('emails.welcome.body', ["siteName" => option('general', 'site_name'), "domain" => config('gzero.domain')])
    </p>
@stop
