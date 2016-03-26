@extends('emails.layouts.default')

@section('emailContent')
    <h1>@lang('emails.passwordReminder.title')</h1>
    <p>
        @lang('emails.passwordReminder.body')
        <a href="{{route('password.reset', [$token])}}" target="_blank">{{route('password.reset', [$token])}}</a>
    </p>
@stop
