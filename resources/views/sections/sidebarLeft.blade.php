@section('asideLeft')
    <div class="{{ isset($class) ? $class : 'col-sm-4' }}">
        @if(!empty($blocks))
            @foreach($blocks as $index => $block)
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{$block['title']}}</h4>
                        <p class="card-text">{{$block['body']}}</p>
                    </div>
                </div>
            @endforeach
        @endif

        {{ $slot }}
    </div>
@stop
