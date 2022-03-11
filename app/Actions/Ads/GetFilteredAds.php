<?php

namespace App\Actions\Ads;

use App\Models\Ad;

class GetFilteredAds
{
    public function execute(array $data)
    {
        $data = [
            'longitude' => 52.5938,
            'latitude' => 0
        ];

        return Ad::paginate();
    }
}
