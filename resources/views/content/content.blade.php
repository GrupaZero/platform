@extends('layouts.default')
@section('bodyClass', $content->theme)
<?php $activeTranslation = $content->translation($lang->code); ?>
<?php $url = $content->routeUrl($lang->code); ?>

@section('metaData')
    @if(isProviderLoaded('Gzero\Social\ServiceProvider'))
        {!! fbOgTags($url, $activeTranslation) !!}
    @endif
@stop

@section('title')
    {{ $activeTranslation->seoTitle() }}
@stop

@section('seoDescription')
    {{ $activeTranslation->seoDescription() }}
@stop

@section('breadcrumbs')
    <div class="utility-container">
        <div class="container text-center-xs">
            {!! Breadcrumbs::render('content') !!}
        </div>
    </div>
@stop

@section('content')
    <h1 class="content-title page-header">
        {{ $activeTranslation->title }}
    </h1>
    <div class="row content-meta">
        <div class="col-sm-7">
            <p class="content-author text-muted">
                <i>@lang('common.postedBy') {{ $content->authorName() }}</i>
                <i>@lang('common.postedOn') {{ $content->publishDate() }}</i>
            </p>
        </div>
        <div class="col-sm-5 text-right text-left-sm text-left-xs">
            @if(isProviderLoaded('Gzero\Social\ServiceProvider'))
                <p class="social-buttons">
                    {!! shareButtons($url, $activeTranslation) !!}
                </p>
            @endif
        </div>
    </div>
    {!! $activeTranslation->body !!}
    @if(config('disqus.enabled') && $content->isCommentAllowed)
        <div class="text-center">
            @include('includes.disqus.disqus', ['contentId' => $content->id, 'url' => $url])
        </div>
    @endif
    <hr>
    <div class="text-muted text-right">
        @lang('common.rating') {!! $content->ratingStars() !!}
    </div>
@stop
