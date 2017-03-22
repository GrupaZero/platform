@section('menuTree')
    {{--<img src="{{ Gravatar::src($user->email, 150) }}" class="center-block img-avatar img-circle">--}}
    <h3>{{ $user->displayName() }}</h3>
    @foreach($menu as $link)
        <li class="{{ (URL::full() ==  $link->url) ? 'active' : '' }}">
            @if(!$link->children->isEmpty())
                <a href="#" title="{{ $link->title }}">{{ $link->title }}<i class="fa arrow"></i></a>
                <ul class="nav collapse">
                    @foreach($link->children as $link)
                        <li class="{{ (URL::full() ==  $link->url) ? 'active' : '' }}">
                            <a href="{{ $link->url }}" title="{{ $link->title }}">{{ $link->title }}</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <a href="{{ $link->url }}" title="{{ $link->title }}">{{ $link->title }}</a>
            @endif
        </li>
    @endforeach
@stop

<ul class="nav nav-pills nav-stacked text-center" role="navigation">
    @yield('menuTree')
</ul>
