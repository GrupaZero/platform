<div class="container">
    @section('footer')
        <div class="clearfix text-muted">
            <div class="copyrights pull-left">
                Copyright &copy; {{ config('gzero.domain') }},
                @lang('common.all_rights_reserved')
            </div>
        </div>
    @show

    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
    @section('footerScripts')
    @show
</div>
@if(option('general', 'cookies_policy_url'))
    @include('includes.cookieInfo')
@endif
<div class="loading"><!-- loading container --></div>
