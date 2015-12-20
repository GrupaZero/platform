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
            <!-- main content -->
            <div id="content" class="col-md-9">
                @yield('content')
            </div>

            <!-- sidebar content -->
            <div id="sidebarRight" class="col-md-3 sidebar">
                @include('includes/messages')
                <div class="panel">
                    @yield('sidebarRight')
                </div>
                @if(!empty($blocks) && $blocks->get('sidebarRight'))
                    @foreach($blocks->get('sidebarRight') as $index => $block)
                        <?php $activeTranslation = $block->getPresenter()->translation($lang->code); ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                {{ $activeTranslation->title }}
                            </div>
                            <div class="panel-body">
                                {{ $activeTranslation->body }}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
<footer id="footer" class="clearfix">
    @include('includes.footer')
</footer>
</body>
</html>
