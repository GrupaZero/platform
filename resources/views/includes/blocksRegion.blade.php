@foreach($blocks->get($regionName) as $index => $block)
    {!! $block->view !!}
@endforeach
