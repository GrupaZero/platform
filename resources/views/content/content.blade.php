@extends('layouts.default')
<?php $activeTranslation = $content->translation($lang->code); ?>
<?php $activeRoute = $content->routeTranslation($lang->code); ?>

@section('title')
    {{ $activeTranslation->title }}
@stop

@section('content')
    <h1 class="page-header">{{ $activeTranslation->title }}</h1>
    <div class="row">
        <div class="col-md-8">
            <p class="text-muted">
                @lang('common.postedBy') {{ $content->authorName() }}
                @lang('common.postedOn') {{ $content->publishDate() }}
            </p>
        </div>
        <div class="col-md-4 text-right">
            <p class="text-muted">@lang('common.rating') {{ $content->ratingStars() }}</p>
        </div>
    </div>
    {{ $activeTranslation->body }}
@stop
