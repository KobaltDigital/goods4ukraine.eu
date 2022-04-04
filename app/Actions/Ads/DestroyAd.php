<?php

namespace App\Actions\Ads;

use App\Models\Ad;
use App\Notifications\AdDestroyedNotification;

class DestroyAd
{
    public function execute(Ad $ad)
    {
        $ad->categories()->detach();
        $ad->forceDelete();

        $ad->notify(new AdDestroyedNotification($ad));
    }
}
