@extends('layout')

@section('contenu')

    <div class="section">
        <h1 class="title is-1"> Bienvenue!! </h1>

        @auth
            <section class="section">
                <h2> Les utilisateurs suivis </h2>
                <ul>
                    @forelse(auth()->user()->suivis as $utilisateur)
                        <li>
                            <a href="/{{ $utilisateur->email }}"> {{ $utilisateur->email }} </a>
                        </li>
                    @empty
                        Vous ne suivez aucun utilisateur
                    @endforelse
                </ul>
            </section>
        @endauth



        <section class="section">
            <h2> Tous les utilisateurs </h2>
            <ul>
                @foreach($utilisateurs as $utilisateur)
                    <li>
                        <a href="/{{ $utilisateur->email }}"> {{ $utilisateur->email }} </a>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>



@endsection
