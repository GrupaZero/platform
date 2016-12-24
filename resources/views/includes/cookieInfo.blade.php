<div id="cookie-info" class="cookie-box">
    <div class="user-information">
        <a id="close-cookie-info" rel="nofollow">×</a>
        <p>
            @lang('common.cookies_info_text')
            @if(config('gzero.multilang.enabled'))
                <a href="{{url() . '/' . $lang->code .'/' . option('general', 'cookies_policy_url') }}"
                   rel="nofollow" title="@lang('common.cookies_info_link_text')">
                    {{ ucfirst(trans('common.cookies_info_link_text')) }}
                </a>
            @else
                <a href="{{url() . '/' . option('general', 'cookies_policy_url')}}"
                   rel="nofollow" title="@lang('common.cookies_info_link_text')">
                    {{ ucfirst(trans('common.cookies_info_link_text')) }}
                </a>
            @endif
        </p>
    </div>
</div>
