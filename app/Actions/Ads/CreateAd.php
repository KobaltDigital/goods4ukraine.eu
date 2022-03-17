<?php

namespace App\Actions\Ads;

use App\Models\Ad;
use App\Models\User;

class CreateAd
{
    public function execute(array $data)
    {
        return Ad::create([
            'user_id' => auth()->user()->id,
            'title' => $data['title'],
            'description' => $data['description'],
            'type' => $data['type'],
            'street' => $data['street'],
            'postcode' => $data['postcode'],
            'city' => $data['city'],
            'country' => $data['country'],
        ]);
    }
}
