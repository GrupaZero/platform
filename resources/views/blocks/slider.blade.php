<div class="{{isset($block->theme) ? $block->theme : 'col-sm-12'}}">
    <div id="slider-{{$block->id}}" class="slider">
        <div class="jumbotron">
            @if(isset($translations))
                <h1>{{ $translations->title }}</h1>
                <p>{!! $translations->body !!}</p>
            @endif
            <p>
                <a class="btn btn-lg btn-success" href="{{ route('register') }}" role="button">
                    @lang('common.get_started_today')
                </a>
            </p>
        </div>
    </div>
</div>
