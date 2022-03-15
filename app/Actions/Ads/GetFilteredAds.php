<?php

namespace App\Actions\Ads;

use App\Models\Ad;
use Grimzy\LaravelMysqlSpatial\Types\Point;

class GetFilteredAds
{
    public function execute(array $data)
    {
        $data['location'] = [52.59468294180227, 4.653462748789553];
        $locationGeometry = new Point(...$data['location']);

        $query = Ad::orderByDistanceSphere('location', $locationGeometry, 'asc');

        if (isset($data['search'])) {
            $query = $query->where('title', 'like', '%' . $data['search'] . '%')
                ->orWhere('city', 'like', '%' . $data['search'] . '%')
                ->orWhere('description', 'like', '%' . $data['search'] . '%');
        }

        if (isset($data['distance'])) {
            $query = $query->distanceSphere('location', $locationGeometry, (int) $data['distance']);
        }

        return $query->paginate();
    }
}
