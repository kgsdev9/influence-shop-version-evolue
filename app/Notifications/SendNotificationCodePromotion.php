<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendNotificationCodePromotion extends Notification implements ShouldQueue
{
    use Queueable;

    protected $user; // Déclarer une propriété pour l'utilisateur

    /**
     * Créer une nouvelle instance de notification.
     *
     * @param  $user
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user; // Affecter l'utilisateur passé au constructeur
    }

    /**
     * Obtenir les canaux de livraison de la notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail']; // Ou ajouter d'autres canaux comme 'database', 'sms', etc.
    }

    /**
     * Obtenir la représentation de l'email de la notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // Récupérer l'agent utilisateur
        $userAgent = request()->header('User-Agent');
        return (new MailMessage)
            ->subject('Code de Promotion')
            ->greeting('Bonjour ' . $this->user->name) // Utilisation du nom de l'utilisateur
            ->line('Nous sommes heureux de vous informer que vous avez reçu un code de promotion.')
            ->line('Votre code de promotion: ' . $this->user->codevente) // Exemple d'utilisation d'un code promotionnel
            ->line('Appareil utilisé pour se connecter: ' . $userAgent) // Afficher l'agent utilisateur dans le message
            ->action('Profitez-en maintenant', url('/dashboard'))
            ->line('Merci de faire partie de notre communauté VTP MARKET!');
    }


    /**
     * Obtenir la représentation de la notification sous forme de tableau.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user_name' => $this->user->name, // Ajouter des informations à la notification en base de données
            'promotion_code' => $this->user->codevente, // Exemple d'ajout d'un code de promotion
        ];
    }
}
