<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Http\Request;

class AdminLoginNotification extends Notification
{
    use Queueable;

    public function __construct(public string $ip, public string $userAgent)
    {
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Inicio de sesión admin - Jacoto Fotografía')
            ->greeting('Se ha iniciado sesión en el panel de administración')
            ->line('**IP:** ' . $this->ip)
            ->line('**Navegador:** ' . $this->userAgent)
            ->line('**Fecha:** ' . now()->format('d/m/Y H:i:s'))
            ->action('Ir al admin', url('/admin'))
            ->salutation('Jacoto Fotografía');
    }
}
