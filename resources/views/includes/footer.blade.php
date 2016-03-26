<div class="container">
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
    <script src="{{ asset('/js/all.js') }}"></script>
    <script src="{{ asset('/js/jquery.sequence-min.js') }}"></script>
    @section('footerScripts')
    @show
</div>
@if(option('general', 'cookiesPolicyUrl'))
    @include('includes.cookieInfo')
@endif
<div class="loading"><!-- loading container --></div>
