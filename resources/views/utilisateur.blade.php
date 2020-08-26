@extends('layout')

@section('contenu')

    <dir class="section">
        <h1 class="title is-1 level">
            <div class="level-left">
                <div class="level-item">
                    <div class="media">
                        <div class="media-left">
                            <figure class="image is-48x48">
                                <img src="/storage/{{ $utilisateur->avatar }}" alt="Avatar">
                            </figure>
                        </div>
                        <div class="media-content">
                            {{ $utilisateur->email }}
                        </div>
                    </div>
                </div>

                @auth
                    <form class="level-item" method="post" action="/{{ $utilisateur->email }}/suivis">
                        @csrf
                        @if (auth()->user()->suit($utilisateur))
                            @method('delete')
                        @endif

                        <button type="submit" class="button">
                            @if (auth()->user()->suit($utilisateur))
                                Ne plus Suivre
                            @else
                                Suivre
                            @endif
                        </button>
                    </form>
                @endauth

            </div>
        </h1>

        @if (auth()->check() AND auth()->user()->id == $utilisateur->id)
            <form action="/messages" method="post">
                @csrf

                <div class="field">
                    <label class="label"> Message</label>
                    <div class="control">
                        <textarea class="textarea" name="message" placeholder="Qu'avez vous à dire ?"></textarea>
                    </div>
                    @if($errors->has('message'))
                        <p class="help is-danger">{{ $errors->first('message') }}</p>
                   @endif
                </div>

                <div class="field">
                    <div class="control">
                        <button class="button is-link" type="submit"> Publier </button>
                    </div>
                </div>

            </form>
        @endif

        @foreach ($utilisateur->messages as $message )

            <hr>

            <p>
                <strong> {{ $message->created_at }} </strong><br>
                {{ $message->contenu }}
            </p>

        @endforeach
    </dir>
@endsection
