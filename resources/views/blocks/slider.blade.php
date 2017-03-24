<div class="{{isset($block->theme) ? $block->theme : 'col-sm-12'}}">
    <?php $activeTranslation = $block->translation($lang->code); ?>
    <div id="slider-{{$block->id}}" class="slider">
        <div class="jumbotron">
            @if(isset($activeTranslation))
                <h1>{{ $activeTranslation->title }}</h1>
                <p>{!! $activeTranslation->body !!}</p>
            @endif
            <p>
                <a class="btn btn-lg btn-success" href="{{ route('register') }}" role="button">
                    @lang('common.get_started_today')
                </a>
            </p>
        </div>
    </div>
</div>
