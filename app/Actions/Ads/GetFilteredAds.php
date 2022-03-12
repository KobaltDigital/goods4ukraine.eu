<?php

namespace App\Actions\Ads;

use App\Models\Ad;
use Grimzy\LaravelMysqlSpatial\Types\Point;

class GetFilteredAds
{
    public function execute(array $data)
    {
        $data['max_distance'] = 150000; // in meters so this is 10km
        $data['location'] = [52.59468294180227, 4.653462748789553];
        $locationGeometry = new Point(...$data['location']);

        $query = Ad::orderByDistanceSphere('location', $locationGeometry, 'asc');
    
        if (isset($data['max_distance'])) {
            $query = $query->distanceSphere('location', $locationGeometry, $data['max_distance']);
        }

        return $query->paginate();
    }
}
