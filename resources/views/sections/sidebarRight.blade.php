@section('asideRight')
    <div class="{{ isset($class) ? $class : 'col-sm-4' }}">
        {{ $slot }}
    </div>
@stop
