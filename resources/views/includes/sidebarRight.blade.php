<!-- sidebar content -->
<div id="sidebarRight" class="{{ $sidebarClass }} sidebar">
    @yield('sidebarRight')
    @if(!empty($blocks) && $blocks->get('sidebarRight'))
        @foreach($blocks->get('sidebarRight') as $index => $block)
            {!! $block->view !!}
        @endforeach
    @endif
</div>
