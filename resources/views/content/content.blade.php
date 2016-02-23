@extends('layouts.default')
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

@section('content')
    {!! Breadcrumbs::render('content') !!}
    <h1 class="page-header">{{ $activeTranslation->title }}</h1>
    <div class="row">
        <div class="col-md-8">
            <p class="text-muted">
                @lang('common.postedBy') {{ $content->authorName() }}
                @lang('common.postedOn') {{ $content->publishDate() }}
            </p>
        </div>
        <div class="col-md-4 text-right">
            <p class="text-muted">@lang('common.rating') {!! $content->ratingStars() !!}</p>
        </div>
    </div>
    {!! $activeTranslation->body !!}

    @if(isProviderLoaded('Gzero\Social\ServiceProvider'))
        <hr/>
        {!! shareButtons($url, $activeTranslation) !!}
    @endif
@stop
