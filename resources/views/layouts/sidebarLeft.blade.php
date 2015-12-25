<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
<div id="wrapper">
    <header>
        @include('includes.navbar')
    </header>
    <div class="container">
        <div class="row">
            <!-- sidebar content -->
            <div id="sidebarLeft" class="col-md-3 sidebar">
                <div class="panel">
                    @yield('sidebarLeft')
                </div>
                @if(!empty($blocks) && $blocks->get('sidebarLeft'))
                    @foreach($blocks->get('sidebarLeft') as $index => $block)
                        {!! $block->view !!}
                    @endforeach
                @endif
            </div>

            <!-- main content -->
            <div id="content" class="col-md-9">
                @include('includes/messages')
                @yield('content')
            </div>

        </div>
    </div>
</div>
<footer id="footer" class="clearfix">
    @include('includes.footer')
</footer>
</body>
</html>
