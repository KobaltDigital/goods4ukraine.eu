<?php

namespace App\Actions;

use Stevebauman\Location\Facades\Location;

class GetClientLocation
{
    public function execute($data)
    {
        if (isset($data['location'])) {
            return $data['location'];
        }

        $ipLocation = Location::get(request()->ip());

        return optional($ipLocation)->cityName;
    }
}
