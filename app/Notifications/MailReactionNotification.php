<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;

class MailReactionNotification extends Notification
{
    use Queueable;

    private $ad;

    public function __construct($data, $ad)
    {
        $this->data = (object) $data;
        $this->ad = $ad;
    }

    public function via($notifiable)
    {
        return ['slack'];
    }

    public function toSlack($notifiable)
    {
        $data = $this->data;
        $url = route('ads.show', ['ad' => $this->ad->slug]);
        $message = sprintf(
            'Reactie op: %s (#%d), verstuurd door: %s (ip: %s, email: %s)',
            $this->ad->title,
            $this->ad->id,
            $data->name,
            request()->ip(),
            $data->email,
        );

        return (new SlackMessage)
            ->content($message)
            ->attachment(function ($attachment) use ($url, $message, $data) {
                $attachment->title($url)
                    ->content(sprintf('Message: %s', $data->message));
            });
    }
}
