<?php

namespace App\Actions\Ads;

use App\Models\Ad;
use App\Models\User;

class CreateAd
{
    public function execute(array $data, User $user)
    {
        return Ad::create([
            'user_id' => $user->id,
            'title' => $data['title'],
            'description' => $data['description'],
            'type' => $data['type'],
            'phone' => $data['phone'],
            'show_phone' => $data['show_phone'],
            'email' => $data['email'],
            'show_email' => $data['show_email'],
            'street' => $data['street'],
            'postcode' => $data['postcode'],
            'city' => $data['city'],
            'country' => $data['country'],
        ]);
    }
}
