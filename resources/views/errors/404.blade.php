@extends('layouts.default')


@section('title')
@stop

@section('content')
    <div class="error-box">
        <div class="row">
            <div class="col-lg-6 col-md-6 indent">
                <h2 class="error-code">404</h2>
                <h3 class="text-uppercase">@lang('common.pageNotFound')</h3>
            </div>
            <div class="col-lg-4 col-md-6">
                <h2>@lang('common.sorry')<br>@lang('common.pageNotFound')</h2>
                <p>@lang('common.404Message')</p>
                <a href="{{ URL::route('home') }}" class="btn btn-primary">@lang('common.backtoHomepage')</a>
            </div>
        </div>
    </div>
@stop
