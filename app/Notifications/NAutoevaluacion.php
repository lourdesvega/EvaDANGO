<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NAutoevaluacion extends Notification implements ShouldQueue
{
    use Queueable;

    protected $mensaje;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($mensaje)
    {
        $this->mensaje = $mensaje;
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

        $url = url('/usr/asignaciones/');
        return (new MailMessage)
            ->subject('Notificación de entrega de nueva autoevaluación')
            ->line('Hay una nueva autoevaluación por completar y contiene la siguiente nota:')
            ->line('"' . $this->mensaje . '"')
            ->action('Ir a la autoevaluacion', url('usr/asignaciones/'));
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
