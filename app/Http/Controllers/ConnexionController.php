<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    public function formulaire()
    {
        return view('connexion');
    }

    public function traitement()
    {

         request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $resultat = auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ]);

        if($resultat){
            flash("Vous êtes maintenant connecté")->success();

            return redirect('/mon-compte');
        }

        return back()->withInput()->withErrors([
            'email' => 'Vos identifiants sont incorrects.'

        ]);
    }
}
