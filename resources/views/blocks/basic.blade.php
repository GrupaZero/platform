<div class="block {{isset($block->theme) ? $block->theme : 'col-sm-12'}}">
    <?php $activeTranslation = $block->translation($lang->code); ?>
    @if(isset($activeTranslation))
        <div class="block-title">
            <h2>{{ $activeTranslation->title }}</h2>
        </div>
        <div class="block-body">
            {!! $activeTranslation->body !!}
        </div>
    @endif
</div>
