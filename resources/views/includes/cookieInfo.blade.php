@if(config('gzero.multilang.enabled'))
    <cookie-law policy-url="{{url('/') . '/' . $lang->code .'/' . option('general', 'cookies_policy_url') }}"></cookie-law>
@else
    <cookie-law policy-url="{{url('/') . '/' . option('general', 'cookies_policy_url')}}"></cookie-law>
@endif
