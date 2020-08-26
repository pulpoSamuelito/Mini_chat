<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticable;

class Utilisateur extends Model implements Authenticatable
{

        use BasicAuthenticable;

        //Pour changer le nom de la table
      //  protected $table = 'mon_nom_de_table';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
                 'email', 'mot_de_passe', 'avatar'
        ];

        public function messages()
        {
            return $this->hasMany(Message::class)->latest();
        }

        public function suivis()
        {
            return $this->belongsToMany(Utilisateur::class, 'suivis', 'suiveur_id', 'suivi_id');
        }

        public function suit($utilisateur)
        {
            return $this->suivis()->where('suivi_id', $utilisateur->id)->exists();
        }


        public function getAuthPassword()
        {

                return $this->mot_de_passe;

        }

        /**
         * Get the column name for the "remember me" token.
         *
         * @return string
         */
        public function getRememberTokenName()
        {

                return '';

        }
         //tes

}
