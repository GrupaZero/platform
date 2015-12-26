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
    </header>
    <div class="container">
        <div class="row">
            @if(!empty($blocks) && $blocks->has('sidebarLeft'))
            @include('includes.sidebarLeft', ['sidebarClass' => $sidebarClass])
            @endif

                    <!-- main content -->
            <div id="content" class="col-sm-{{ $contentClass }}">
                @include('includes.messages')
                @section('content')
                @show
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
