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
            <a class="navbar-brand" href="{{ route('home') }}">{{ option('general', 'siteName') }}</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="{{ (URL::full() ==  route('home')) ? 'active' : '' }}">
                    <a href="{{ route('home') }}">Home</a>
                </li>
            </ul>
            @if (!Auth::check())
                <ul class="nav navbar-nav navbar-right">
                    <li class="{{ (URL::full() ==  route('login')) ? 'active' : '' }}">
                        <a href="{{ route('login') }}">@lang('common.login')</a>
                    </li>
                    <li class="{{(URL::full() ==  route('register')) ? 'active' : '' }}">
                        <a href="{{ route('register') }}">@lang('common.register')</a>
                    </li>
                </ul>
            @else
                <ul class="nav navbar-nav navbar-right user-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle height-50" data-toggle="dropdown" href="#">
                            <img src="{{ Gravatar::src(Auth::user()->email, 35) }}"
                                 class="navbar-avatar">
                            {{ Auth::user()->firstName }} {{ Auth::user()->lastName }}
                            <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            @if (Auth::user()->isAdmin)
                            <li>
                                <a href="{{ route('admin') }}" target="_blank">
                                    @lang('user.admin_panel') <i class="fa fa-cogs pull-right"></i>
                                </a>
                            </li>
                            @endif
                            <li class="{{ (URL::full() ==  route('account')) ? 'active' : '' }}">
                                <a href="{{ route('account') }}">
                                    @lang('user.my_account') <i class="fa fa-user pull-right"></i>
                                </a>
                            </li>
                            <li class="{{ (URL::full() ==  route('account.edit')) ? 'active' : '' }}">
                                <a href="{{ route('account.edit') }}">@lang('user.edit_account')
                                    <i class="fa fa-pencil pull-right"></i>
                                </a>
                            </li>
                            {{--<li>--}}
                                {{--<a href="#">@lang('user.get_help') <i class="fa fa-question-circle pull-right"></i></a>--}}
                            {{--</li>--}}
                            <li class="divider"></li>
                            <li class="{{ (URL::full() ==  route('logout')) ? 'active' : '' }}">
                                <a href="{{ route('logout') }}">
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
