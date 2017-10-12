@section('mainContent')
    <div id="content" class="{{ isset($class) ? $class : 'col-sm-12' }}">
        {{ $slot }}
    </div>
@stop
