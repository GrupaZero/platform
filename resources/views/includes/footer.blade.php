<div class="loading"><!-- loading container --></div>
<div class="container">
    @section('footer')
        <p class="text-muted">
            Copyright &copy; {{ config('gzero.domain') }},
            @lang('common.allRightsReserved')
        </p>
        @show

        <link href="{{ asset('/css/owl.carousel.css') }}" rel="stylesheet" />
        <link href="{{ asset('/css/owl.theme.css') }}" rel="stylesheet" />
        <link href="{{ asset('/css/owl.transitions.css') }}" rel="stylesheet" />

        <!-- Scripts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="{{ asset('/js/common.js') }}"></script>
        <script src="{{ asset('/js/jquery.metisMenu.js') }}"></script>
        <script src="{{ asset('/js/owl.carousel.min.js') }}"></script>

        <script type="text/javascript">
            $(function() {
                $(".nav-stacked").metisMenu({
                    toggle: false
                });
                //Expand parent of an active element
                $(".nav-stacked li.active").parents('li').addClass('active').has('ul').children('ul').addClass('collapse in');
            });
        </script>
    @section('footerScripts')
    @show
</div>
