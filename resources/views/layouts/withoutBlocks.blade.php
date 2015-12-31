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
    <div id="main-container" class="container mt20">
        <div class="row">
            <div id="content" class="col-sm-12">
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
