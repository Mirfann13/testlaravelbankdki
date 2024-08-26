<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\PembukaanRekening;

class PembukaanRekeningApproved extends Notification
{
    use Queueable;

    protected $pembukaanRekening;

    public function __construct(PembukaanRekening $pembukaanRekening)
    {
        $this->pembukaanRekening = $pembukaanRekening;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Pembukaan Rekening Disetujui')
                    ->line('Pembukaan rekening untuk nasabah ' . $this->pembukaanRekening->nama . ' telah disetujui.')
                    ->line('Terima kasih telah menggunakan layanan kami.');
    }
}