@extends('layout')

@section('contenu')

    <div class="section" >
        <div class="media">
            <div class="media-left">
                <figure class="image is-48x48">
                    <img src="/storage/{{ auth()->user()->avatar }}" alt="Avatar">
                </figure>
            </div>
            <div class="media-content">
                <h1 class="title is-1" > Mon compte </h1>
            </div>
        </div>
    </div>

    <form action="/modification-avatar" method="post" enctype="multipart/form-data" >

        @csrf


        <div class="field">

            <label class="label"> Nouvel Avatar </label>

            <div class="control">

                <input class="input" type="file" name="avatar">

            </div>

            @if($errors->has('avatar'))

             <p class="help is-danger" > {{$errors->first('avatar')}} </p>

            @endif

        </div>

        <div class="field" >

            <div class="control" >

                <button class="button is-link" type="submit"> Modifier mon avatar </button>

            </div>

        </div>
    </form>

    <form action="/modification-mot-de-passe" method="post" class="section" >

        @csrf


        <div class="field">

            <label class="label"> Nouveau mot de passe </label>

            <div class="control">

                <input class="input" type="password" name="password" placeholder="Mot de passe" >

            </div>

            @if($errors->has('password'))

             <p class="help is-danger" > {{$errors->first('password')}} </p>

            @endif

        </div>

        <div class="field">

            <label class="label"> Mot de passe (confirmation) </label>

            <div class="control">

                <input class="input" type="password" name="password_confirmation" placeholder="Mot de passe (confirmation) ">

            </div>

            @if($errors->has('password_confirmation'))

             <p class="help is-danger" > {{$errors->first('password_confirmation')}} </p>

            @endif

        </div>

        <div class="field" >

            <div class="control" >

                <button class="button is-link" type="submit"> Modifier mon mot de passe </button>

            </div>

        </div>
    </form>
@endsection

