<div class="block {{isset($block->theme) ? $block->theme : 'col-sm-12'}}">
    @if(isset($translations))
        <div class="block-title">
            <h2>{{ $translations->title }}</h2>
        </div>
        <div class="block-body">
            {!! $translations->body !!}
        </div>
    @endif
</div>
