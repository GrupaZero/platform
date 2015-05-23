@extends('emails.layouts.default')

@section('emailContent')
    <h1>@lang('emails.passwordReminder.title')</h1>

    <p>
        @lang('emails.passwordReminder.body', ["url" => HTML::link(route('password.reset', [$token]), null ,['target' => '_blank'])])
    </p>
@stop
