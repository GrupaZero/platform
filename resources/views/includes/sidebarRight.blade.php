<!-- sidebar content -->
<div id="sidebarRight" class="{{ $sidebarClass }} sidebar mh-column clearfix">
    @yield('sidebarRight')
    @if(!empty($blocks) && $blocks->get('sidebarRight'))
        @foreach($blocks->get('sidebarRight') as $index => $block)
            {!! $block->view !!}
        @endforeach
    @endif
</div>
<!-- end #sidebar-right -->
