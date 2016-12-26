<!DOCTYPE html>
<html lang="{{ isset($lang) ? $lang->code : config('app.locale') }}">
<head>
    @include('includes.head')
</head>
<body class="@yield('bodyClass') sidebar-left">
<?php $sidebarClass = 'col-md-3'; ?>
<?php $contentClass = 12 - (1 * substr($sidebarClass, -1)); ?>
<div id="app" class="wrapper">
    <header>
        @include('includes.langs')
        @include('includes.navbar')
    </header>
    @yield('breadcrumbs')
    <div id="main-container" class="container">
        <div class="row">
            @include('includes.sidebarLeft', ['sidebarClass' => $sidebarClass])
            <div id="content" class="col-sm-{{ $contentClass }}  mh-column">
                @include('includes.messages')
                @section('content')
                    {{-- CONTENT SECTION --}}
                @show
            </div>
            <!-- end #content -->
        </div>
    </div>
    <!-- end #main-container -->
</div>
<footer id="footer" class="clearfix">
    @include('includes.footer')
</footer>
</body>
</html>
