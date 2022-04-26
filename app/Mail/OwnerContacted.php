<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OwnerContacted extends Mailable
{
    use SerializesModels;

    public $data;
    public $ad;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $ad)
    {
        $this->data = (object) $data;
        $this->ad = $ad;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject(__('Reaction on ad: :ad', ['ad' => $this->ad->title]))
            ->markdown('emails.owner-contacted');
    }
}
