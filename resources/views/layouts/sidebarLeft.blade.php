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
            <!-- sidebar content -->
            <div id="sidebarLeft" class="col-md-3 sidebar">
                @yield('sidebarLeft')
            </div>

            <!-- main content -->
            <div id="content" class="col-md-9">
                @include('includes/messages')
                @yield('content')
            </div>

        </div>
    </div>
</div>
<footer id="footer">
    @include('includes.footer')
</footer>
</body>
</html>
