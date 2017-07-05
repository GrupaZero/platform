@if(!empty($paginator) && $paginator->currentPage() > 1)
    <link rel="canonical" href="{{$paginator->url($paginator->currentPage())}}"/>
@else
    <link rel="canonical" href="{{url()->current()}}"/>
@endif
@if(!empty($paginator) && $paginator->hasPages())
    @if($paginator->previousPageUrl())
        @if($paginator->currentPage() - 1 == 1)
            <link rel="prev" href="{{preg_replace('/\?page=1$|page=1&|&page=1/', '' , $paginator->previousPageUrl())}}"/>
        @else
            <link rel="prev" href="{{$paginator->previousPageUrl()}}"/>
        @endif
    @endif
    @if($paginator->hasMorePages())
        <link rel="next" href="{{$paginator->nextPageUrl()}}"/>
    @endif
@endif
