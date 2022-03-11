<?php

namespace App\Actions\Ads;

use App\Models\Ad;

class GetFilteredAds
{
    public function execute(array $data)
    {
        $ads = Ad::paginate();
        dd($ads);
    }
}
