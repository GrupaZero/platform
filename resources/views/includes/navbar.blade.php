<!-- Fixed navbar -->
<div id="navigation" class="navbar navbar-inverse" role="navigation">
    <div class="container clearfix">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">@lang('common.toggleNavigation')</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}" title="{{ config('gzero.siteName') }}">
                <img src="{{ asset('/images/logo.png') }}" alt="{{ config('gzero.siteName') }}">
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav main-nav">
                <li class="{{ (URL::full() ==  route('home')) ? 'active' : '' }}">
                    <a href="{{ route('home') }}">@lang('common.home')</a>
                </li>
            </ul>
            @if (!Auth::check())
                <div class="navbar-right">
                    <a href="{{ route('login') }}" class="btn btn-default navbar-btn"
                       title="@lang('common.login')">
                        @lang('common.login')
                    </a>
                    <a href="{{ route('register') }}" class="btn btn-primary navbar-btn"
                       title="@lang('common.register')">
                        @lang('common.register')
                    </a>
                </div>
            @else
                <ul class="nav navbar-nav navbar-right user-nav">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <img src="{{ Gravatar::src(Auth::user()->email, 35) }}"
                                 class="navbar-avatar img-circle">
                            {{ Auth::user()->getPresenter()->displayName() }}
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
