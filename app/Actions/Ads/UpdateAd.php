<?php

namespace App\Actions\Ads;

use App\Models\Ad;
use App\Actions\Ads\Translate;
use Illuminate\Support\Facades\DB;

class UpdateAd
{
    public function execute(Ad $ad, array $data)
    {
        $translate = new Translate();

        $data['translated_title'] = $translate->execute($data['title']);
        $data['translated_description'] = $translate->execute($data['description']);

        // check if address is changed/dirty
        if( 
            $ad->street != $data['street'] || 
            $ad->postcode != $data['postcode'] || 
            $ad->city != $data['city'] || 
            $ad->country != $data['country']            
        ) {
            // update location
            $str = urlencode($data['street'] . ' ' . $data['postcode'] . ' ' . $data['city'] . ' ' . $data['country']);
            $json = file_get_contents('https://maps.googleapis.com/maps/api/place/findplacefromtext/json?fields=geometry&input='. $str .'&inputtype=textquery&key=' . env('GOOGLE_API_KEY'));
            $jsonDecoded = json_decode($json);

            if($jsonDecoded && $jsonDecoded->status == 'OK') {
                $lat = $jsonDecoded->candidates[0]->geometry->location->lat;
                $lng = $jsonDecoded->candidates[0]->geometry->location->lng;
                $data['location'] = DB::raw("ST_GeomFromText('POINT({$lng} {$lat})', 0)");
            } else {
                dd($jsonDecoded);
            }
        }



        return $ad->update($data);
    }
}
