@extends('layouts.default')

@section('content')

    @include('blocks.slider')

    @if(!empty($blocks) && $blocks->get('homepage'))
        <div class="row">
            @foreach($blocks->get('homepage') as $index => $block)
                <div class="col-sm-3">
                    <?php $activeTranslation = $block->getPresenter()->translation($lang->code); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            {{ $activeTranslation->title }}
                        </div>
                        <div class="panel-body">
                            {{ $activeTranslation->body }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    @foreach($contents as $index => $child)
        <?php $activeTranslation = $child->translation($lang->code); ?>
        @if($activeTranslation)
            <?php $activeRoute = $child->routeTranslation($lang->code); ?>
            <?php $childUrl = url('/'). '/' . $activeRoute->langCode .'/' . $activeRoute->url; ?>
            <div class="media">
                <h2 class="page-header">
                    <a href="{{ $childUrl }}">
                        {{ $activeTranslation->title }}
                    </a>
                </h2>
                <div class="media-body">
                    <div class="row">
                        <div class="col-md-8">
                            <p class="text-muted">
                                @lang('common.postedBy') {{ $child->authorName() }}
                                @lang('common.postedOn') {{ $child->publishDate() }}
                            </p>
                        </div>
                        <div class="col-md-4 text-right">
                            <p class="text-muted">@lang('common.rating') {!! $child->ratingStars() !!}</p>
                        </div>
                    </div>
                    <p>
                        <a href="{{ $childUrl }}">
                            <img class="img-responsive" src="http://placehold.it/847x312"
                                 width="847" height="312" alt="{{$activeTranslation->title}}">
                        </a>
                    </p>
                    {!! $activeTranslation->teaser !!}
                </div>
                <hr/>
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ $childUrl }}" class="btn btn-default">
                            @lang('common.readMore')
                        </a>
                    </div>
                    <div class="col-md-6 text-right">
                        <p class="text-muted">@lang('common.numberOfViews') {{ $child->visits }}</p>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

    {!! $contents->render() !!}

@stop
