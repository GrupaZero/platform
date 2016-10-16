<div class="{{isset($block->theme) ? $block->theme : 'col-sm-12'}}">
    <div class="slider" id="slider-{{$block->id}}">
        <ul class="sequence-canvas">
            <li class="slide1">
                <div class="jumbotron text-center">
                    @if(isset($translations))
                        <h1>{{ $translations->title }}</h1>
                        <p>{!! $translations->body !!}</p>
                    @endif
                    <p>
                        <a class="btn btn-lg btn-success" href="{{ route('register') }}" role="button">
                            @lang('common.getStartedToday')
                        </a>
                    </p>
                </div>
            </li>
            <li class="slide2">
                <div class="jumbotron text-center">
                    @if(isset($translations))
                        <h1>{{ $translations->title }}</h1>
                        <p>{!! $translations->body !!}</p>
                    @endif
                    <p>
                        <a class="btn btn-lg btn-success" href="{{ route('register') }}" role="button">
                            @lang('common.getStartedToday')
                        </a>
                    </p>
                </div>
            </li>
        </ul>
    </div>
</div>

<script type="application/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        var options = {
            animateStartingFrameIn: false,
            autoPlay: true,
            autoPlayDelay: 8000
        };
        var mySequence = $("#slider-" + "{{ $block->id }}").sequence(options).data("sequence");
    });
</script>
