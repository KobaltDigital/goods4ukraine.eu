<?php

namespace App\Actions\Ads;

use App\Models\Ad;
use App\Models\User;

class UpdateAd
{
    public function execute(Ad $ad, array $data)
    {
        return $ad->update($data);
    }
}
