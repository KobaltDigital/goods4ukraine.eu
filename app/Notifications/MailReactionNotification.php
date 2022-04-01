<?php

namespace App\Notifications;

use App\Mail\OwnerContacted;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\SlackMessage;

class MailReactionNotification extends Notification
{
    use Queueable;

    private $ad;

    public function __construct($data, $ad)
    {
        $this->ad = $ad;
        $this->data = (object) $data;
    }

    public function via($notifiable)
    {
        return ['slack', 'mail'];
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
                    ->content(sprintf('Message: %s', $data->message_translated['nl']));
            });
    }

    public function toMail($notifiable)
    {
        return (new OwnerContacted($this->data, $this->ad))->to($notifiable->email);
    }
}
