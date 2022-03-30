<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;

class AdCreatedNotification extends Notification
{
    use Queueable;

    private $ad;

    public function __construct($ad)
    {
        $this->ad = $ad;
    }

    public function via($notifiable)
    {
        return ['slack'];
    }

    public function toSlack($notifiable)
    {
        $url = route('ads.show', ['ad' => $this->ad->slug]);
        $message = sprintf(
            'Nieuwe advertentie: %s (#%d), geplaatst door: %s (#%d - ip: %s)',
            $this->ad->title,
            $this->ad->id,
            $this->ad->user->name,
            $this->ad->user->id,
            request()->ip(),
        );

        return (new SlackMessage)
            ->attachment(function ($attachment) use ($url, $message) {
                $attachment->title($url)->content($message);
            });
    }
}
