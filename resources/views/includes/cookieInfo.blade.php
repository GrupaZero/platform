<div id="cookie-info" class="cookie-box">
    <div class="user-information">
        <a id="close-cookie-info" rel="nofollow">×</a>
        <p>
            @lang('common.cookiesInfoText')
            @if(config('gzero.multilang.enabled'))
                <a href="{{url() . '/' . $lang->code .'/' . option('general', 'cookiesPolicyUrl') }}"
                   rel="nofollow" title="@lang('common.cookiesInfoLinkText')">
                    {{ ucfirst(trans('common.cookiesInfoLinkText')) }}
                </a>
            @else
                <a href="{{url() . '/' . option('general', 'cookiesPolicyUrl')}}"
                   rel="nofollow" title="@lang('common.cookiesInfoLinkText')">
                    {{ ucfirst(trans('common.cookiesInfoLinkText')) }}
                </a>
            @endif
        </p>
    </div>
</div>
