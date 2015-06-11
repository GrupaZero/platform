<div class="slider" id="slider">
    <ul class="sequence-canvas">
        <li class="slide1">
            <div class="jumbotron text-center">
                <h1>GZERO CMS!</h1>

                <p class="lead">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa
                    justo sit amet.Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>

                <p>
                    <a class="btn btn-lg btn-success" href="{{ route('register') }}" role="button">Get started today</a>
                </p>
            </div>

        </li>
        <li class="slide2">
            <div class="jumbotron text-center">
                <h1>Marketing stuff!</h1>

                <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac
                    cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>

                <p>
                    <a class="btn btn-lg btn-success" href="{{ route('register') }}" role="button">Get started today</a>
                </p>
            </div>
        </li>
    </ul>
</div>

@section('footerScripts')

    <script src="{{ asset('/js/jquery.sequence-min.js') }}"></script>

    <script>
        $(document).ready(function() {

            $(document).ready(function() {
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
