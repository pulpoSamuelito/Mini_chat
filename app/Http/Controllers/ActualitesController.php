<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActualitesController extends Controller
{
    public function liste()
    {

        /* dd(auth()->user()->suivis->map(function ($utilisateur) {
            return $utilisateur->messages;
        })->flatten()->toArray()); */

        $messages =auth()->user()
        ->suivis
        ->load('messages') //récupération de tous les sms des users avec une requête
      /* //avec function anonyme
         ->map(function ($utilisateur) {
            return $utilisateur->messages;
        }) */
      /*   //sans fonction anonyme
        ->map->messages
        ->flatten() */

        //Combinaison de flatten et map
        ->flatMap->messages

      /* //avec function anonyme
         ->sortByDesc(function ($message) {
            return $message->created_at;
        }); */
        ->sortByDesc-> created_at;

        return view('actualites', [
            'messages' => $messages,
        ]);
    }
}
