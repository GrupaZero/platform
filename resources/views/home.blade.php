@extends('layouts.default')

@section('content')
    <div class="jumbotron text-center">
        <h1>Marketing stuff!</h1>

        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac
            cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>
        <p>
            <a class="btn btn-lg btn-success" href="{{ route('register') }}" role="button">Get started today</a>
        </p>
    </div>
@stop
