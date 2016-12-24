@extends('layouts.withoutBlocks')


@section('title')
@stop

@section('content')
    <div class="error-box">
        <div class="row">
            <div class="col-lg-6 col-md-6 indent">
                <h2 class="error-code">404</h2>
                <h3 class="text-uppercase">@lang('common.page_not_found')</h3>
            </div>
            <div class="col-lg-4 col-md-6">
                <h2>@lang('common.sorry')<br>@lang('common.page_not_found')</h2>
                <p>@lang('common.404_message')</p>
                <a href="{{ route('home') }}" class="btn btn-primary">@lang('common.back_to_homepage')</a>
            </div>
        </div>
    </div>
@stop
