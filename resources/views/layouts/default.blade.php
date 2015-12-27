<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.head')
</head>
<body>
<?php $sidebarClass = 'col-md-3'; ?>
<?php $contentClass = (isset($sidebarsNumber)) ? 12 - ($sidebarsNumber * substr($sidebarClass, -1)) : 12; ?>
<div id="wrapper">
    <header>
        @include('includes.navbar')
        @if(!empty($blocks) && $blocks->has('header'))
            {!! $block->view !!}
        @endif
    </header>
    <div class="container">
        <div class="row">
            @if(!empty($blocks) && $blocks->has('sidebarLeft'))
                @include('includes.sidebarLeft', ['sidebarClass' => $sidebarClass])
            @endif

                    <!-- main content -->
            <div id="content" class="col-sm-{{ $contentClass }}">
                @if(!empty($blocks) && $blocks->has('contentHeader'))
                    {!! $block->view !!}
                @endif
                @include('includes.messages')
                @section('content')@show
                @if(!empty($blocks) && $blocks->has('contentFooter'))
                    {!! $block->view !!}
                @endif
            </div>

            @if(!empty($blocks) && $blocks->has('sidebarRight'))
                @include('includes.sidebarRight', ['sidebarClass' => $sidebarClass])
            @endif
        </div>
    </div>
</div>
<footer id="footer" class="clearfix">
    @include('includes.footer')
</footer>
</body>
</html>
