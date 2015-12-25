<div class="col-sm-3">
    @if(isset($translations))
        <h2>{{ $translations->title }}</h2>
        {!! $translations->body !!}
    @endif
</div>
