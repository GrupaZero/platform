<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ routeMl('home') }}" title="{{ config('app.name') }}">
        <img src="{{ asset('/images/logo.png') }}" alt="{{ config('app.name') }}">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="@lang('common.toggle_navigation')">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav">
            <li class="nav-item{{ (URL::full() == routeMl('home')) ? ' active' : '' }}">
                <a class="nav-link" href="{{ routeMl('home') }}">
                    @lang('common.home')
                    @if((URL::full() == routeMl('home')))
                        <span class="sr-only">(@lang('common.current'))</span>
                    @endif
                </a>
            </li>
        </ul>
        @guest
        <ul class="navbar-nav ml-md-auto">
            <li class="nav-item">
                <a href="{{ route('login') }}" class="btn btn-outline-success my-2 my-sm-0"
                   title="@lang('common.login')">
                    @lang('common.login')
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('register') }}" class="btn btn-outline-primary ml-2 my-2 my-sm-0"
                   title="@lang('common.register')">
                    @lang('common.register')
                </a>
            </li>
        </ul>
        @endguest
        @auth
        <ul class="navbar-nav ml-md-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#"
                   id="navbarUserNav" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ $user->displayName() }}
                </a>
                <div class="dropdown-menu user-nav dropdown-menu-right" aria-labelledby="navbarUserNav">
                    @if ($user->isSuperAdmin() && isProviderLoaded('Gzero\Admin\ServiceProvider'))
                        <a href="{{ route('admin') }}" target="_blank" class="dropdown-item">
                            @lang('user.admin_panel') <i class="fa fa-cogs pull-right" aria-hidden="true"></i>
                        </a>
                    @endif
                    <a href="{{ route('account') }}" class="dropdown-item">
                        @lang('user.my_account') <i class="fa fa-user pull-right" aria-hidden="true"></i>
                    </a>
                    <a href="{{ route('account.edit') }}" class="dropdown-item">
                        @lang('user.edit_account') <i class="fa fa-pencil pull-right" aria-hidden="true"></i>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item">
                        @lang('common.logout') <i class="fa fa-sign-out fa-fw pull-right" aria-hidden="true"></i>
                    </a>
                </div>
            </li>
        </ul>
        @endauth
    </div>
</nav>
