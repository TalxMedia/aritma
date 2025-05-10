<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FilterReminderNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $customer;

    public function __construct($customer)
    {
        $this->customer = $customer;
    }

    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Filtre Değişim Hatırlatma')
            ->greeting('Merhaba ' . $this->customer->name . ',')
            ->line('Size hatırlatmak istedik: son filtre değişiminiz 6 ay önce yapılmış.')
            ->line('Lütfen en kısa sürede yeni filtrenizi taktırmak için bizimle iletişime geçin.')
            ->action('Randevu Al', url('/appointments'))
            ->line('Teşekkür ederiz, iyi günler dileriz!');
    }

    public function toArray($notifiable)
    {
        return [
            'message' => 'Filtre değişim hatırlamanız var.',
            'customer_id' => $this->customer->id,
        ];
    }
}
