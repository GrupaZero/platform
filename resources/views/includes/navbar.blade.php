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
            <a class="navbar-brand" href="{{ URL::route('home') }}">{{ config('gzero.siteName') }}</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li{{ (URL::full() ==  URL::route('home')) ? ' class="active"' : '' }}>
                    <a href="{{ URL::route('home') }}">Home</a>
                </li>
            </ul>
            @if (!Auth::check())
                <ul class="nav navbar-nav navbar-right">
                    <li{{ (URL::full() ==  URL::route('login')) ? ' class="active"' : '' }}>
                        <a href="{{ URL::route('login') }}">@lang('common.login')</a>
                    </li>
                    <li{{ (URL::full() ==  URL::route('register')) ? ' class="active"' : '' }}>
                        <a href="{{ URL::route('register') }}">@lang('common.register')</a>
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
                            <li{{ (URL::full() ==  URL::route('account')) ? ' class="active"' : '' }}>
                                  <a href="{{ URL::route('account') }}">
                                    @lang('user.my_account') <i class="fa fa-user pull-right"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ URL::route('account.edit') }}">@lang('user.edit_account')
                                    <i class="fa fa-pencil pull-right"></i>
                                </a>
                            </li>
                            {{--<li>--}}
                                {{--<a href="#">@lang('user.get_help') <i class="fa fa-question-circle pull-right"></i></a>--}}
                            {{--</li>--}}
                            <li class="divider"></li>
                            <li>
                                <a href="{{ URL::route('/auth/logout') }}">
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
