<div class="slider" id="slider">
    <ul class="sequence-canvas">
        @foreach($slides as $slide)
            <li>

                <div class="jumbotron text-center"  style=" background: url({{ config('gzero.upload.public').'/slides/'.$slide }});
                        background-size: cover;
                        background-position: center;
                        height: 400px;">
                    <h1>Marketing stuff!</h1>

                    <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac
                        cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>
                    <p>
                        <a class="btn btn-lg btn-success" href="{{ route('register') }}" role="button">Get started today</a>
                    </p>
                </div>

            </li>
        @endforeach
    </ul>
</div>

@section('footerScripts')

<script src="{{ asset('/js/jquery.sequence-min.js') }}"></script>

<script>
    $(document).ready(function() {

        $(document).ready(function(){
            var options = {
                animateStartingFrameIn: false,
                autoPlay: true,
                autoPlayDelay: 5000
            };

            var mySequence = $("#slider").sequence(options).data("sequence");
        });

    });
</script>

@stop
