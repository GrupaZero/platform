<div class="container">
    @if(!empty($blocks) && $blocks->has('footer'))
        <div id="footer-region" class="block-region clearfix mt20">
            <div class="row">
                @include('includes.blocksRegion', ['regionName' => 'footer'])
            </div>
        </div>
    @endif
    @section('footer')
        <div class="clearfix text-muted">
            <div class="copyrights pull-left">
                Copyright &copy; {{ config('gzero.domain') }},
                @lang('common.allRightsReserved')
            </div>
        </div>
    @show

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('/js/common.js') }}"></script>
    <script src="{{ asset('/js/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('/js/jquery.sequence-min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            $(".nav-stacked").metisMenu({
                toggle: false
            });
            // Expand parent of an active element
            $(".nav-stacked li.active").parents('li').addClass('active').has('ul').children('ul').addClass('collapse in');
            // Loading on form submit actions
            $('form').submit(function(event) {
                Loading.start('body');
            })
        });
    </script>
    @section('footerScripts')
    @show
</div>
<div class="loading"><!-- loading container --></div>
