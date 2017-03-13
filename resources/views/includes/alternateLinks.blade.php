@if(config('gzero.multilang.enabled'))
    <link rel="alternate" href="{{env('APP_URL')}}" hreflang="x-default" />
    @if(empty($content))
        <link rel="alternate" href="{{url()->current()}}" hreflang="{{$lang->code}}"/>
    @else
        @foreach($content->route->translations as $translation)
            <link rel="alternate" href="{{$content->routeUrl($translation->lang_code)}}" hreflang="{{$translation->lang_code}}"/>
        @endforeach
    @endif
@endif
