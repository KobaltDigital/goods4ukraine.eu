<?php

namespace App\Actions\Ads;

use App\Models\Ad;
use App\Models\User;
use App\Actions\Ads\Translate;

class CreateAd
{
    public function execute(array $data)
    {
        $translate = new Translate();

        return Ad::create([
            'user_id' => auth()->user()->id,
            'title' => $data['title'],
            'description' => $data['description'],
            'translated_title' => $translate->execute($data['title']),
            'translated_description' => $translate->execute($data['description']),
            'type' => $data['type'],
            'street' => $data['street'],
            'postcode' => $data['postcode'],
            'city' => $data['city'],
            'country' => $data['country'],
        ]);
    }
}
