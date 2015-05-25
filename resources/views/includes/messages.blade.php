@if(session('messages'))
    <div class="message-box">
        @foreach(session('messages') as $message)
            <div class="alert alert-{{ $message['code'] }} alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {!! $message['code'] == 'error' ? '<strong>' . trans('common.error') . ':</strong> ' : '' !!}
                {{ $message['text'] }}
            </div>
        @endforeach
    </div>
@endif
