<?php

namespace App\Notifications;

use App\Models\Pengaduan;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class StatusPengaduanNotification extends Notification
{
    public function __construct(public Pengaduan $pengaduan) {}

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('🔔 Status Pengaduan Kamu Diperbarui — RT Baleendah')
            ->greeting('Halo, ' . $notifiable->name . '!')
            ->line('Status pengaduan kamu telah diperbarui oleh pengurus RT.')
            ->line('**Judul:** ' . $this->pengaduan->judul)
            ->line('**Status Baru:** ' . $this->pengaduan->status_label)
            ->when($this->pengaduan->catatan_pengurus, function ($mail) {
                return $mail->line('**Catatan Pengurus:** ' . $this->pengaduan->catatan_pengurus);
            })
            ->action('Lihat Detail', url('/warga/pengaduan/' . $this->pengaduan->id))
            ->line('Terima kasih telah menyampaikan pengaduan kamu.')
            ->salutation('Salam, RT Baleendah');
    }
}