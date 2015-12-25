<div class="col-sm-12">
    <div class="slider" id="slider">
        <ul class="sequence-canvas">
            <li class="slide1">
                <div class="jumbotron text-center">
                    @if(isset($translations))
                        <h1>{{ $translations->title }}</h1>
                        {!! $translations->body !!}
                    @endif

                    <p>
                        <a class="btn btn-lg btn-success" href="{{ route('register') }}" role="button">Get started today</a>
                    </p>
                </div>

            </li>
            <li class="slide2">
                <div class="jumbotron text-center">
                    @if(isset($translations))
                        <h1>{{ $translations->title }}</h1>
                        {!! $translations->body !!}
                    @endif

                    <p>
                        <a class="btn btn-lg btn-success" href="{{ route('register') }}" role="button">Get started today</a>
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
            autoPlayDelay: 5000
        };

        var mySequence = $("#slider").sequence(options).data("sequence");
    });
</script>
