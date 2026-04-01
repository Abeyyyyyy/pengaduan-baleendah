<?php

namespace App\Notifications;

use App\Models\Pengaduan;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PengaduanBaruNotification extends Notification
{
    public function __construct(public Pengaduan $pengaduan) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('📢 Pengaduan Baru Masuk — RT Baleendah')
            ->greeting('Halo, ' . $notifiable->name . '!')
            ->line('Ada pengaduan baru yang masuk dari warga.')
            ->line('**Nama Warga:** ' . $this->pengaduan->user->name)
            ->line('**Judul:** ' . $this->pengaduan->judul)
            ->line('**Kategori:** ' . $this->pengaduan->kategori)
            ->line('**Deskripsi:** ' . $this->pengaduan->deskripsi)
            ->action('Lihat Pengaduan', url('/ketua/pengaduan'))
            ->line('Segera tindaklanjuti pengaduan ini.')
            ->salutation('Salam, RT Baleendah');
    }
}