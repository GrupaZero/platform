@if(!empty($paginator) && $paginator->currentPage() > 1)
    <link rel="canonical" href="{{$paginator->url($paginator->currentPage())}}"/>
@else
    <link rel="canonical" href="{{Url::current()}}"/>
@endif
@if(!empty($paginator) && $paginator->hasPages())
    @if($paginator->previousPageUrl())
        <link rel="prev" href="{{$paginator->previousPageUrl()}}"/>
    @endif
    @if($paginator->hasMorePages())
        <link rel="next" href="{{$paginator->nextPageUrl()}}">
    @endif
@endif
