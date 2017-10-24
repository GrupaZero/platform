<!DOCTYPE html>
<html lang="{{ isset($lang) ? $lang->code : config('app.locale') }}">
<head>
    @include('includes.head')
</head>
<body class="@yield('bodyClass') sidebar-right">
@include('includes.googleTagManagerScript')
<div id="root" class="page">
    <?php $sidebarClass = 'col-md-3'; ?>
    <?php $contentClass = 12 - (1 * substr($sidebarClass, -1)); ?>
    <div class="wrapper">
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
        @yield('breadcrumbs')
        @if(!empty($blocks) && $blocks->has('featured'))
            <div id="featured-region" class="block-region container-fluid clearfix">
                <div class="row">
                    @include('includes.blocksRegion', ['regionName' => 'featured'])
                </div>
            </div>
        @endif
        <div id="main-container" class="container">
            <div class="row">
                <div id="content" class="col-sm-{{ $contentClass }} mh-column">
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
                @include('includes.sidebarRight', ['sidebarClass' => $sidebarClass])
            </div>
        </div>
        <!-- end #main-container -->
    </div>
    <footer id="footer" class="clearfix">
        <div class="container">
            @if(!empty($blocks) && $blocks->has('footer'))
                <div id="footer-region" class="block-region clearfix">
                    <div class="row">
                        @include('includes.blocksRegion', ['regionName' => 'footer'])
                    </div>
                </div>
            @endif
        </div>
        @include('includes.footer')
    </footer>
</div>
<!-- end #root -->
@include('includes.footerScripts')
</body>
</html>
