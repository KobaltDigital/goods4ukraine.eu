<?php

namespace App\Actions\Ads;

use App\Models\Ad;
use App\Helpers\Translate;
use Illuminate\Support\Facades\DB;
use App\Notifications\AdUpdatedNotification;

class UpdateAd
{
    public function execute(Ad $ad, array $data)
    {
        $data['translated_title'] = Translate::string($data['title']);
        $data['translated_description'] = Translate::string($data['description']);

        // check if address is changed/dirty
        if (
            $ad->street != $data['street'] ||
            $ad->postcode != $data['postcode'] ||
            $ad->city != $data['city'] ||
            $ad->country != $data['country']
        ) {
            // update location
            $url = 'https://maps.googleapis.com/maps/api/place/findplacefromtext/json?fields=geometry&input=%s&inputtype=textquery&key=%s';
            $json = file_get_contents(sprintf(
                $url,
                urlencode($data['street'] . ' ' . $data['postcode'] . ' ' . $data['city'] . ' ' . $data['country']),
                config('goods4ukraine.google.api_key')
            ));
            $jsonDecoded = json_decode($json);

            if ($jsonDecoded && $jsonDecoded->status == 'OK') {
                $lat = $jsonDecoded->candidates[0]->geometry->location->lat;
                $lng = $jsonDecoded->candidates[0]->geometry->location->lng;
                $data['location'] = DB::raw("ST_GeomFromText('POINT({$lng} {$lat})', 0)");
            }
        }

        $ad->update($data);

        $ad->categories()->sync([$data['category']]);

        $ad->notify(new AdUpdatedNotification($ad));

        return true;
    }
}
