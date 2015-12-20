<div class="loading"><!-- loading container --></div>
<div class="container">
    @if(!empty($blocks) && $blocks->get('footer'))
        <div class="row mt20">
            @foreach($blocks->get('footer') as $index => $block)
                <div class="col-sm-4">
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
    @section('footer')
        <p class="text-muted">
            Copyright &copy; {{ config('gzero.domain') }},
            @lang('common.allRightsReserved')
        </p>
    @show

        <!-- Scripts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
        <script src="{{ asset('/js/common.js') }}"></script>
        <script src="{{ asset('/js/jquery.metisMenu.js') }}"></script>

        <script type="text/javascript">
            $(function() {
                $(".nav-stacked").metisMenu({
                    toggle: false
                });
                // Expand parent of an active element
                $(".nav-stacked li.active").parents('li').addClass('active').has('ul').children('ul').addClass('collapse in');
                // Loading on form submit actions
                $('form').submit(function (event) {
                    Loading.start('body');
                })
            });
        </script>
    @section('footerScripts')
    @show
</div>
