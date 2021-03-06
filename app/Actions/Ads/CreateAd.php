<?php

namespace App\Actions\Ads;

use App\Models\Ad;
use App\Helpers\Translate;
use Illuminate\Support\Facades\DB;
use App\Notifications\AdCreatedNotification;

class CreateAd
{
    public function execute(array $data)
    {
        // update location
        $url = 'https://maps.googleapis.com/maps/api/place/findplacefromtext/json?fields=geometry&input=%s&inputtype=textquery&key=%s';
        $json = file_get_contents(sprintf(
            $url,
            urlencode($data['street'] . ' ' . $data['postcode'] . ' ' . $data['city'] . ' ' . $data['country']),
            config('goods4ukraine.google.api_key')
        ));
        $jsonDecoded = json_decode($json);

        $data['location'] = null;
        $deleted_at = null;
        if ($jsonDecoded && $jsonDecoded->status == 'OK') {
            $lat = $jsonDecoded->candidates[0]->geometry->location->lat;
            $lng = $jsonDecoded->candidates[0]->geometry->location->lng;
            $data['location'] = DB::raw("ST_GeomFromText('POINT({$lng} {$lat})', 0)");
        } else {
            $deleted_at = now();
        }

        $ad = Ad::create([
            'user_id' => auth()->user()->id,
            'title' => $data['title'],
            'description' => $data['description'],
            'translated_title' => Translate::string($data['title']),
            'translated_description' => Translate::string($data['description']),
            'type' => $data['type'],
            'street' => $data['street'],
            'postcode' => $data['postcode'],
            'city' => $data['city'],
            'country' => $data['country'],
            'location' => $data['location'],
            'deleted_at' => $deleted_at
        ]);

        $ad->categories()->sync([$data['category']]);
        $ad->notify(new AdCreatedNotification($ad));

        return $ad;
    }
}
