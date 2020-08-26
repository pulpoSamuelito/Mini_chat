<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

       <!-- Fonts -->
         <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
         <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

        {{-- ajout de lien  --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.8.1/css/bulma.css" />

    </head>
    <body>
        <nav class="navbar is-light">
            <div class="navbar-menu">
                <div class="navbar-start">
                    {{--  Sans l'utilisation de la vue navbar-item
                        <a href="/" class="navbar-item {{ request()->is('/') ? 'is-active' : '' }}"> Acceuil </a>  --}}

                    @include('partials.navbar-item', ['lien' => '/', 'texte' => 'Acceuil'])

                  {{--     Sans l'utilisation de la directive blade pour verifier si un utilisateur est connectée  --}}
         {{--       @if(auth()->check())

                        @include('partials.navbar-item', ['lien' => auth()->user()->email, 'texte' => auth()->user()->email])

                    @endif  --}}

                    {{--  Avec la directive blade  --}}
                    @auth

                         @include('partials.navbar-item', ['lien' => 'actualites', 'texte' => 'Actualités'])
                         @include('partials.navbar-item', ['lien' => auth()->user()->email, 'texte' => auth()->user()->email])

                    @endauth
                </div>

                <div class="navbar-end">
                    @auth

                        @include('partials.navbar-item', ['lien' => 'mon-compte', 'texte' => 'Mon compte'])

                        @include('partials.navbar-item', ['lien' => '/deconnexion', 'texte' => 'Déconnexion'])

                    @else

                        @include('partials.navbar-item', ['lien' => 'connexion', 'texte' => 'Connexion'])

                        @include('partials.navbar-item', ['lien' => 'inscription', 'texte' => 'Inscription'])

                    @endauth

                </div>
            </div>
        </nav>

        <div class="container">

            @include('flash::message')

            @yield('contenu')

        </div>

    </body>
</html>
