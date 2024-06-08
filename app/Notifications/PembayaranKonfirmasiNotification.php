<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PembayaranKonfirmasiNotification extends Notification
{
    use Queueable;

    private $pembayaran;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($pembayaran)
    {
        $this->pembayaran = $pembayaran;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
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
            'pembayaran_id'     => $this->pembayaran->id,
            'title'             => 'Konfirmasi Pembayaran',
            'messages'          => 'Pembayran tagihan ukt atas nama ' . $this->pembayaran->tagihan->siswa->nama . ' telah dikonfirmasi.',
            'url'               => route('wali.pembayaran.show', $this->pembayaran->id),
        ];
    }
}
