<?php

namespace App\Actions\Ads;

use App\Models\Ad;
use App\Notifications\AdReservedNotification;

class ReserveAd
{
    public function execute(Ad $ad)
    {
        $ad->delete();
        $ad->notify(new AdReservedNotification($ad));
    }
}
