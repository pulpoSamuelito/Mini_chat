<?php

namespace App\Http\Controllers;

use App\Utilisateur;
use App\Message;

class UtilisateursController extends Controller
{
    public function liste()
    {
        $utilisateurs = Utilisateur::all();

        return view('utilisateurs', [
            'utilisateurs' => $utilisateurs,

        ]);
    }

    public function voir()
    {
        $email = request('email');

        // Recherche de l'email d'un utilisateur enregistrer dans la base de donnée et retourne une 404 si l'élt est introuvable
        $utilisateur = Utilisateur::where('email', $email)->firstorFail();

        /*
        //recupération des messages par ordre décroissant de création
        $messages = Message::where('utilisateur_id', $utilisateur->id)->orderByDesc('created_at')->get();
        */

        /*
        //recupération des messages par ordre décroissant de création en utilisant l'astuce latest() de laravel
        $messages = Message::where('utilisateur_id', $utilisateur->id)->latest()->get();
        */

    //    $messages = $utilisateur->messages; //ici messages n'a pas de () car on fait référence à une méthode contenu dans un modèle et non à une colonne


        return view('utilisateur', [
            'utilisateur' => $utilisateur,
           // 'messages' => $messages,
        ]);
    }
}
