<!-- Fixed navbar -->
<div class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">@lang('common.toggleNavigation')</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('home') }}">{{ config('gzero.siteName') }}</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li{{ (URL::full() ==  url('home')) ? ' class="active"' : '' }}>
                    <a href="{{ url('home') }}">Home</a>
                </li>
            </ul>
            @if (!Auth::check())
                <ul class="nav navbar-nav navbar-right">
                    <li{{ (URL::full() ==  url('/auth/login')) ? ' class="active"' : '' }}>
                        <a href="{{ url('/auth/login') }}">@lang('common.login')</a>
                    </li>
                    <li{{ (URL::full() ==  url('/auth/register')) ? ' class="active"' : '' }}>
                        <a href="{{ url('/auth/register') }}">@lang('common.register')</a>
                    </li>
                </ul>
            @else
                <ul class="nav navbar-nav navbar-right user-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li{{ (URL::full() ==  url('account')) ? ' class="active"' : '' }}>
                                  <a href="{{ url('account') }}">
                                    @lang('user.my_account') <i class="fa fa-user pull-right"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('account.edit') }}">@lang('user.edit_account')
                                    <i class="fa fa-pencil pull-right"></i>
                                </a>
                            </li>
                            {{--<li>--}}
                                {{--<a href="#">@lang('user.get_help') <i class="fa fa-question-circle pull-right"></i></a>--}}
                            {{--</li>--}}
                            <li class="divider"></li>
                            <li>
                                <a href="{{ url('/auth/logout') }}">
                                    @lang('common.logout') <i class="fa fa-sign-out fa-fw pull-right"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                </ul>
            @endif
        </div>
        <!--/.nav-collapse -->
    </div>
</div>
