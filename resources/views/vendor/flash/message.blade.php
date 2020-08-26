@foreach (session('flash_notification', collect())->toArray() as $message)

    <section class="section">
        @if ($message['overlay'])
            @include('flash::modal', [
                'modalClass' => 'flash-modal',
                    'title'      => $message['title'],
                    'body'       => $message['message']
                ])
        @else
            <div class="message
                is-{{ $message['level'] }}
                {{ $message['important'] ? 'alert-important' : '' }}"
                role="alert"
            >
                @if ($message['important'])
                    <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-hidden="true"
                    >&times;</button>
                @endif
                <div class="message-body">
                    {!! $message['message'] !!}
                </div>

            </div>
        @endif
    </section>

@endforeach

{{ session()->forget('flash_notification') }}
