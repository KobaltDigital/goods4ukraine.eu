<?php

namespace App\Actions\Ads;

use App\Models\Ad;
use App\Helpers\Translate;
use App\Notifications\MailReactionNotification;

class Contact
{
    public function execute(array $data, Ad $ad)
    {
        $data['message_translated'] = Translate::string($data['message']);
        $ad->notify(new MailReactionNotification($data, $ad));
    }
}
