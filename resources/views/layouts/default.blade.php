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
    <!-- main content -->
    <div id="content" class="container">
        @include('includes.messages')
        @section('content')
        @show
    </div>
</div>
<footer id="footer" class="clearfix">
    @include('includes.footer')
</footer>
</body>
</html>
