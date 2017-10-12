<!DOCTYPE html>
<html lang="{{ isset($lang) ? $lang->code : app()->getLocale() }}">
<head>
    @include('includes.head')
</head>
<body class="@yield('bodyClass')">
<div id="root" class="page">
    <div class="wrapper">
        @yield('header')
        <div id="main-container" class="container">
            <div class="row">
                @yield('asideLeft')
                @yield('mainContent')
                @yield('asideRight')
            </div>
        </div>
        @yield('footer')
    </div>
</div>
<!-- end #root -->
@include('includes.footer')
</body>
</html>
