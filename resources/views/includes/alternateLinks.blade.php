@if(config('gzero.multilang.enabled') && !empty($content))
    @foreach($content->route->translations as $translation)
        <link rel="alternate" href="{{$content->routeUrl($translation->langCode)}}"
              hreflang="{{$translation->langCode}}"/>
    @endforeach
@endif
