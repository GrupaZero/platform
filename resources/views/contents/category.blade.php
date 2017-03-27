@extends('layouts.default')
@section('bodyClass', $content->theme)
<?php $activeTranslation = $content->translation($lang->code); ?>

@section('title'){{ $activeTranslation->seoTitle() }}@stop
@section('seoDescription'){{ $activeTranslation->seoDescription() }}@stop
@section('head')
    @parent
    @include('includes.canonical', ['paginator' => $children])
    @include('includes.alternateLinks', ['content' => $content])
    @if(method_exists($content, 'stDataMarkup'))
        {!! $content->stDataMarkup($lang->code) !!}
    @endif
@stop
@section('breadcrumbs')
    <div class="utility-container">
        <div class="container text-center-xs">
            {!! Breadcrumbs::render('category') !!}
        </div>
    </div>
@stop
@section('content')
    @include('includes.notPublishedContentMsg')
    <h1 class="content-title page-header">
        {{ $activeTranslation->title }}
    </h1>
    {!! $activeTranslation->body !!}
    @if($children)
        @foreach($children as $index => $child)
            <?php $activeTranslation = $child->translation($lang->code); ?>
            @if($activeTranslation)
                <?php $childUrl = $child->routeUrl($lang->code); ?>
                <div class="media">
                    <h2 class="page-header" title="{{ $activeTranslation->title }}">
                        <a href="{{ $childUrl }}">
                            {{ $activeTranslation->title }}
                        </a>
                    </h2>
                    <div class="media-body">
                        <div class="row article-meta">
                            <div class="col-xs-8">
                                <p class="text-muted">
                                    <small> @lang('common.posted_by') {{ $child->authorName() }}</small>
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
                @if($index < sizeof($children) -1)
                    <hr/>
                @endif
            @endif
        @endforeach
        {!! $children->render() !!}
    @endif
@stop
@section('footerScripts')
    @if(config('disqus.enabled') && config('disqus.domain'))
        <script id="dsq-count-scr" src="//{{config('disqus.domain')}}.disqus.com/count.js" async></script>
    @endif
@stop
