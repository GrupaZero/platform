<!DOCTYPE html>
<html lang="{{ $lang->code }}">
<head>
    @include('includes.head')
</head>
<body class="@yield('bodyClass') sidebar-right">
<?php $sidebarClass = 'col-md-3'; ?>
<?php $contentClass = 12 - (1 * substr($sidebarClass, -1)); ?>
<div id="wrapper">
    <header>
        @include('includes.langs')
        @include('includes.navbar')
    </header>
    @yield('breadcrumbs')
    <div id="main-container" class="container">
        <div class="row">
            <div id="content" class="col-sm-{{ $contentClass }} mh-column">
                @include('includes.messages')
                @section('content')
                    {{-- CONTENT SECTION --}}
                @show
            </div>
            <!-- end #content -->
            @include('includes.sidebarRight', ['sidebarClass' => $sidebarClass])
        </div>
    </div>
    <!-- end #main-container -->
</div>
<footer id="footer" class="clearfix">
    @include('includes.footer')
</footer>
</body>
</html>
