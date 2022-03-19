<?php

namespace App\Actions\Ads;

use App\Models\Ad;
use App\Actions\Ads\Translate;

class UpdateAd
{
    public function execute(Ad $ad, array $data)
    {
        $translate = new Translate();

        $data['translated_title'] = $translate->execute($data['title']);
        $data['translated_description'] = $translate->execute($data['description']);

        return $ad->update($data);
    }
}
