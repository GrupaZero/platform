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
                @yield('sidebarRight')
            </div>
        </div>
    </div>
</div>
<footer id="footer">
    @include('includes.footer')
</footer>
</body>
</html>
