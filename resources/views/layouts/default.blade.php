<!DOCTYPE html>
<html lang="{{ isset($lang) ? $lang->code : config('app.locale') }}">
<head>
    @include('includes.head')
</head>
<body class="@yield('bodyClass') {{!empty($blocks) && $blocks->has('sidebarLeft') ? 'sidebar-left' : ''}}{{!empty($blocks) && $blocks->has('sidebarRight') ? ' sidebar-right' : ''}}">
<?php $sidebarClass = 'col-md-3'; ?>
<?php $contentClass = (isset($sidebarsNumber)) ? 12 - ($sidebarsNumber * substr($sidebarClass, -1)) : 12; ?>
<div id="app" class="wrapper">
    <header>
        @include('includes.langs')
        @if(!empty($blocks) && $blocks->has('header'))
            <div id="header-region" class="block-region clearfix container mb20">
                <div class="row">
                    @include('includes.blocksRegion', ['regionName' => 'header'])
                </div>
            </div>
        @endif
        @include('includes.navbar')
    </header>
    @yield('contentTitle')
    @yield('breadcrumbs')
    @if(!empty($blocks) && $blocks->has('featured'))
        <div id="featured-region" class="block-region container-fluid clearfix">
            <div class="row">
                @include('includes.blocksRegion', ['regionName' => 'featured'])
            </div>
        </div>
    @endif
    @section('homepageRegion')
        {{-- HOMEPAGE REGION SECTION --}}
    @show
    <div id="main-container" class="container">
        <div class="row">
            @if(!empty($blocks) && $blocks->has('sidebarLeft'))
                @include('includes.sidebarLeft', ['sidebarClass' => $sidebarClass])
            @endif
            <div id="content" class="col-md-{{ $contentClass }} mh-column">
                @if(!empty($blocks) && $blocks->has('contentHeader'))
                    <div id="content-header-region" class="block-region clearfix">
                        <div class="row">
                            @include('includes.blocksRegion', ['regionName' => 'contentHeader'])
                        </div>
                    </div>
                @endif
                @include('includes.messages')
                @section('content')
                    {{-- CONTENT SECTION --}}
                @show
                @if(!empty($blocks) && $blocks->has('contentFooter'))
                    <div id="content-footer-region mt20" class="block-region clearfix">
                        <div class="row">
                            @include('includes.blocksRegion', ['regionName' => 'contentFooter'])
                        </div>
                    </div>
                @endif
            </div>
            <!-- end #content -->
            @if(!empty($blocks) && $blocks->has('sidebarRight'))
                @include('includes.sidebarRight', ['sidebarClass' => $sidebarClass])
            @endif
        </div>
    </div>
    <!-- end #main-container -->
</div>
<footer id="footer" class="clearfix">
    <div class="container">
        @if(!empty($blocks) && $blocks->has('footer'))
            <div id="footer-region" class="block-region clearfix mt20">
                <div class="row">
                    @include('includes.blocksRegion', ['regionName' => 'footer'])
                </div>
            </div>
        @endif
    </div>
    @include('includes.footer')
</footer>
</body>
</html>
