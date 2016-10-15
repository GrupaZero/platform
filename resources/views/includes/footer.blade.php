<div class="container">
    @section('footer')
        <div class="clearfix text-muted">
            <div class="copyrights pull-left">
                Copyright &copy; {{ config('gzero.domain') }},
                @lang('common.allRightsReserved')
            </div>
        </div>
    @show

    <script src="{{ asset('/js/app.js') }}"></script>
    @section('footerScripts')
    @show
</div>
@if(option('general', 'cookiesPolicyUrl'))
    @include('includes.cookieInfo')
@endif
<div class="loading"><!-- loading container --></div>
