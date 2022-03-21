<?php

namespace App\Actions\Ads;

use App\Models\Ad;
use Grimzy\LaravelMysqlSpatial\Types\Point;

class GetFilteredAds
{
    public function execute(array $data)
    {
        if (isset($data['longitude']) && isset($data['latitude'])) {
            $data['location'] = [$data['latitude'], $data['longitude']];
        } else {
            $data['location'] = [52.59468294180227, 4.653462748789553];
        }
        $locationGeometry = new Point(...$data['location']);

        $query = Ad::orderByDistanceSphere('location', $locationGeometry, 'asc');

        if (isset($data['search'])) {
            $query = $query->where('title', 'like', '%' . $data['search'] . '%')
                ->orWhere('city', 'like', '%' . $data['search'] . '%')
                ->orWhere('description', 'like', '%' . $data['search'] . '%');
        }

        if (isset($data['distance']) && $data['distance'] > 10) {
            $query = $query->distanceSphere('location', $locationGeometry, (int) $data['distance']);
        }

        if (isset($data['type'])) {
            $query = $query->where('type', $data['type']);
        }

        return $query->paginate(25);
    }
}
