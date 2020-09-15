<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Modelos\Ticket;

class Mensaje extends Notification
{
    use Queueable;

    public $ticket;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('ticket/'.$this->ticket->id);

        return (new MailMessage)
                    ->subject('Ticket'.' '.$this->ticket->id)
                    ->line('Gracias por contactar con nuestro equipo de soporte. Se ha abierto un ticket de soporte para usted. Se le notificará cuando reciba una respuesta por correo electrónico. Los detalles de su boleto se muestran a continuación:')
                    ->line('Titulo del ticket: '.$this->ticket->titulo_tk)
                    ->line('Descripcion: '.$this->ticket->descripcion_tk)
                    ->action('Ver Ticket', $url);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
