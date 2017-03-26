@extends('layouts.default')
@section('bodyClass', 'home')
@section('head')
    @parent
    @if(!empty($contents))
        @include('includes.canonical', ['paginator' => $contents])
    @endif
    @if(config('gzero.multilang.enabled'))
        <link rel="alternate" href="{{env('APP_URL')}}" hreflang="x-default"/>
        @foreach($langs as $availableLang)
            <link rel="alternate" href="{{url('/') . '/' . $availableLang->code}}" hreflang="{{$availableLang->code}}"/>
        @endforeach
    @endif
@stop
@section('homepageRegion')
    @if(!empty($blocks) && $blocks->has('homepage'))
        <div id="homepage-region" class="block-region clearfix container">
            <div class="row">
                @include('includes.blocksRegion', ['regionName' => 'homepage'])
            </div>
        </div>
    @endif
@stop
@section('content')
    @if(!empty($contents))
        @foreach($contents as $index => $child)
            <?php $activeTranslation = $child->translation($lang->code); ?>
            @if($activeTranslation)
                <?php $childUrl = $child->routeUrl($lang->code); ?>
                <div class="media">
                    <h2 class="page-header">
                        <a href="{{ $childUrl }}">
                            {{ $activeTranslation->title }}
                        </a>
                    </h2>
                    <div class="media-body">
                        <div class="row article-meta">
                            <div class="col-xs-8">
                                <p class="text-muted">
                                    <small>@lang('common.posted_by') {{ $child->authorName() }}</small>
                                    <small>@lang('common.posted_on') {{ $child->publishDate() }}</small>
                                </p>
                            </div>
                            @if(config('disqus.enabled') && $child->isCommentAllowed)
                                <div class="col-xs-4 text-right">
                                    <a href="{{ $childUrl }}#disqus_thread"
                                       data-disqus-identifier="{{ $child->id }}"
                                       class="disqus-comment-count">
                                        0 @lang('common.comments')
                                    </a>
                                </div>
                            @endif
                        </div>
                        @if($child->thumb)
                            <?php $thumbTranslation = $child->thumb->translation($lang->code); ?>
                            <div class="thumb mb20">
                                <img class="img-responsive"
                                     title="{{($thumbTranslation)? $thumbTranslation->title : ''}}"
                                     src="{{croppaUrl($child->thumb->getFullPath(),
                                    config('gzero.image.thumb.width'), config('gzero.image.thumb.height'))}}"
                                     alt="{{($thumbTranslation)? $thumbTranslation->title : ''}}">
                            </div>
                        @endif
                        {!! $activeTranslation->teaser !!}
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <a href="{{ $childUrl }}" class="btn btn-default read-more">
                                @lang('common.read_more')
                            </a>
                        </div>
                        <div class="col-sm-8 text-right text-left-xs mt20-xs">
                            <ul class="list-inline text-muted">
                                <li>
                                    @lang('common.rating') {!! $child->ratingStars() !!}
                                </li>
                                <li>
                                    @lang('common.number_of_views') {{ $child->visits }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @if($index < sizeof($contents) -1)
                    <hr/>
                @endif
            @endif
        @endforeach
        {!! $contents->render() !!}
    @endif
@stop
@section('footerScripts')
    @if(config('disqus.enabled') && config('disqus.domain'))
        <script id="dsq-count-scr" src="//{{config('disqus.domain')}}.disqus.com/count.js" async></script>
    @endif
@stop
