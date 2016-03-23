<!DOCTYPE html>
<html lang="{{ $lang->code }}">
<head>
    @include('includes.head')
</head>
<body class="@yield('bodyClass')">
<div id="wrapper">
    <header>
        @include('includes.langs')
        @include('includes.navbar')
    </header>
    @yield('breadcrumbs')
    <div id="main-container" class="container">
        <div class="row">
            <div id="content" class="col-sm-12 mh-column">
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
