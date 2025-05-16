<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification implements ShouldQueue
{
    use Queueable;
    private $name,$product,$price;

    /**
     * Create a new notification instance.
     */
    public function __construct($name,$product,$price)
    {
        //
        $this->name=$name;
        $this->product=$product;
        $this->price=$price;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */

  // notifiable الشخص اللي واصل اله الاشعار
    public function via(object $notifiable): array
    {

        // اشعار رح يوصل على ايميل ف لازم اكون رابطة ع مايل او مايلتراب

       // mail, database, broardcast, vonage, slack
        return ['mail'];
        // return ['database'];
    }

    function toDatabase(object $notifiable): array
    {
        return [
            'data' => 'New Order '.$this->name.' has ordered '.$this->product.
                ' with price '.$this->price,
            'url' => route('admin.orders'),
        ];
    }



    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->greeting('Hello!' . $notifiable->name)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
