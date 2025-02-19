<?php

namespace App\Notifications;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewPost extends Notification
{
    use Queueable;

//    public Post $post;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Post $post)
    {
//        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $url = url('/posts-module');
        return (new MailMessage)
                    ->line('SE HA CREADO UN POST')
                    ->line('POST: ' . $this->post->title)
                    ->action('Ver Post', $url)
                    ->line('Hola mundo!');
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

    public function toDatabase(object $notifiable): array
    {
        return [
            'post_id' => $this->post->id,
            'user_id' => $this->post->user_id,
            'title' => $this->post->title,
            'created_at' => $this->post->created_at,
        ];
    }
}
