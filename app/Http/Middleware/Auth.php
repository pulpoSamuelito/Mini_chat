<?php

namespace App\Http\Middleware;

use Closure;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
       /*  dump('Auth Middleware');
        die(); */

        if(auth()->guest()){

            flash("Vous devez être connecté pour voir cette page.")->error();

            return redirect('/connexion');
               /*
                  Erreurs sans utilisation de laracasts
                 return redirect('/connexion')->withErrors([
                'email' => "Vous devez être connecté pour voir cette page."
            ]); */
        }

        return $next($request);
    }
}
