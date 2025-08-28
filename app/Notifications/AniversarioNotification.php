<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class AniversarioNotification extends Notification
{
    use Queueable;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via(object $notifiable): array
    {
        return ['mail']; // Pode ser database, slack, etc
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('🎂 Feliz Aniversário!')
            ->greeting("Parabéns, {$this->user->nome}!")
            ->line('Toda nossa equipe deseja muitas felicidades e sucesso.')
            ->line('Aproveite o seu dia! 🎉');
    }
}
