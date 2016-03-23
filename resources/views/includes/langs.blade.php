@if(config('gzero.multilang.enabled'))
    <div class="container text-right small">
        <ul class="langs-list list-inline m0">
            @foreach($langs as $availableLang)
                <li class="{{ ($lang->code ==  $availableLang->code) ? 'active' : '' }}">
                    <a href="{{url() . '/' . $availableLang->code}}" class="small">
                        {{strtoupper($availableLang->code)}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endif
