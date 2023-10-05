<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChangeStatus extends Notification implements ShouldQueue
{
    use Queueable;

    private $statusModel;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($model)
    {
        $this->statusModel = $model;
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
        $url = route('bill.show', ['bill' => $this->statusModel->id]);

        return (new MailMessage)
            ->subject(__('Order status has been updated'))
            ->greeting(__('Hello! Mr/Mrs ') . $this->statusModel->user->fullname)
            ->line(__('Your order status has been changed to: ') . __($this->statusModel->status))
            ->line(__('For more information about your order, please click the link below.'))
            ->action(__('View order detail'), $url)
            ->line(__("If your order status is Confirmed, you can't cancel your order."))
            ->line('----------------------------------------------------------------')
            ->line(__('Thank you for using our service!'))
            ->line(__('If you have any questions, please conact us.'));
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
