<?php

namespace App\Notifications;

use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ReservationEmail extends Notification
{
    use Queueable;

    protected $reservation;

    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Nouvelle Réservation')
                    ->greeting('Bonjour!')
                    ->line('Vous avez une nouvelle réservation!')
                    ->line('Nom: ' . $this->reservation->nom)
                    ->line('Email: ' . $this->reservation->email)
                    ->line('Téléphone: ' . $this->reservation->telephone)
                    ->line('Chambre: ' . $this->reservation->chambre)
                    ->line('Date d\'arrivée: ' . $this->reservation->arrivee)
                    ->line('Date de départ: ' . $this->reservation->depart)
                    ->line('Nombre de personnes: ' . $this->reservation->personnes)
                    ->line('Nombre d\'enfants: ' . $this->reservation->nombre_enfants)
                    ->line('Message: ' . $this->reservation->message)
                    ->line('Merci pour votre réservation!');
    }

    public function toArray($notifiable)
    {
        return [
            'reservation_id' => $this->reservation->id,
            'nom' => $this->reservation->nom,
            'email' => $this->reservation->email,
        ];
    }
}
