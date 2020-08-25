<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NouveauSuiveurMail extends Mailable
{
    use Queueable, SerializesModels;

    public $suiveur;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($suiveur)
    {
       $this->suiveur = $suiveur;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Vous avez un nouveau suiveur !')
      /* //Sans utilisation du markdown
         ->view('mails.nouveau_suiveur')
        ->text('mails.nouveau_suiveur_text'); */

        //utilisation du markdown
        ->markdown('mails.nouveau_suiveur_markdown');
    }
}
