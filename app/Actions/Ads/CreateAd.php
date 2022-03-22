<?php

namespace App\Actions\Ads;

use App\Models\Ad;
use App\Actions\Ads\Translate;
use Illuminate\Support\Facades\DB;

class CreateAd
{
    public function execute(array $data)
    {
        $translate = new Translate();

        $str = urlencode($data['street'] . ' ' . $data['postcode'] . ' ' . $data['city'] . ' ' . $data['country']);
        $json = file_get_contents('https://maps.googleapis.com/maps/api/place/findplacefromtext/json?fields=geometry&input=' . $str . '&inputtype=textquery&key=AIzaSyBR-4XYGeEEnH5A0L3qVMt1yjcY8Exd82k');
        $jsonDecoded = json_decode($json);

        $lat = 0;
        $lng = 0;
        if ($jsonDecoded && $jsonDecoded->status == 'OK') {
            $lat = $jsonDecoded->candidates[0]->geometry->location->lat;
            $lng = $jsonDecoded->candidates[0]->geometry->location->lng;
        }

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
            'location' => DB::raw("ST_GeomFromText('POINT({$lng} {$lat})', 0)"),
        ]);
    }
}
