<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DailyReportNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Günlük Sistem Raporu')
            ->greeting('Merhaba ' . $this->user->name . ',')
            ->line('Sana günlük sistem raporunu gönderiyoruz.')
            ->action('Raporu Görüntüle', url('/reports/daily'))
            ->line('İyi çalışmalar!');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Günlük sistem raporun hazır.',
            'user_id' => $this->user->id,
        ];
    }
}
