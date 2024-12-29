<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmationeEmailInfluenceur extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    // Constructeur de la classe
    public function __construct($user)
    {
        $this->user = $user;
    }

    // Méthode pour construire le mail
    public function build()
    {
        return $this->subject('Inscription réussie à Influence Shop')
            ->view('emails.infuenceurs.inscription_confirmation');
    }
}
