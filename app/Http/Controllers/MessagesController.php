<?php

namespace App\Http\Controllers;

use App\Message;

class MessagesController extends Controller
{
    public function nouveau ()
    {

        request()->validate([
            'message' => ['required'],
        ]);

        //Affichage de message sans utilisation des relations entre modèles
       /*   Message::create([
            'utilisateur_id' => auth()->id(),
            'contenu' => request('message'),
        ]);
       */

      //Affichage de message avec utilisation des relations entre modèles
      auth()->user()->messages()->create([
        'contenu' => request('message'),
      ]);

      flash("Votre message est a bien été publié")->success();
      return back();

    }
}
