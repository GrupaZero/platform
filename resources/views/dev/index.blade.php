@extends('layouts.default')

@section('title')
    Developer
@stop

@section('content')
    <style type="text/css">
        .table {
            margin-top : 20px;
        }
        .table > tbody > tr > td {
            padding : 10px;
        }
    </style>
    <div role="tabpanel">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
                <a href="#contents" aria-controls="contents" role="tab" data-toggle="tab">
                    @lang('common.contentsList')
                </a>
            </li>
            @if(Auth::user())
                <li role="presentation">
                    <a href="#user" aria-controls="user" role="tab" data-toggle="tab">
                        @lang('user.user')
                    </a>
                </li>
            @endif
            <li role="presentation">
                <a href="#emails" aria-controls="emails" role="tab" data-toggle="tab">
                    @choice('common.email', 2)
                </a>
            </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="contents">
                <table class="table table-bordered text-center">
                    <thead>
                    <tr>
                        <th>@lang('common.title')</th>
                        <th class="text-center">@lang('common.status')</th>
                        <th class="text-center">@lang('common.order')</th>
                        <th class="text-center">@lang('common.author')</th>
                        <th>@lang('common.path')</th>
                        <th class="text-center">@lang('common.type')</th>
                    </tr>
                    </thead>

                    <tbody>
                    @each('dev.treeNode', $tree, 'content')
                    </tbody>
                </table>
            </div>
            @if(Auth::user())
                <div role="tabpanel" class="tab-pane fade" id="user">
                    <h3>{{ Auth::user()->firstName }} {{ Auth::user()->lastName }}</h3>

                    <p>Login: {{ Auth::user()->email }}</p>

                    <p>@lang('common.password'): {{ Auth::user()->password }}</p>

                    <p>Remember token: {{ Auth::user()->rememberToken or'empty' }}</p>
                </div>
            @endif
            <div role="tabpanel" class="tab-pane fade" id="emails">
                <h3>@lang('common.welcome')</h3>
                <iframe src="{{ URL::route('_dev.emails', 'auth.welcome') }}" frameborder="0" width="100%" height="350"></iframe>
                <hr/>
                <h3>@lang('common.passReminder')</h3>
                <iframe src="{{ URL::route('_dev.emails', 'auth.reminder') }}" frameborder="0" width="100%" height="350"></iframe>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.nav-tabs a').click(function (e) {
            e.preventDefault();
            $(this).tab('show')
        })
    </script>
@stop
