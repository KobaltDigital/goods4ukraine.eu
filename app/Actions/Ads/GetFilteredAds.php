<?php

namespace App\Actions\Ads;

use App\Models\Ad;
use Illuminate\Support\Facades\DB;
use Grimzy\LaravelMysqlSpatial\Types\Point;

class GetFilteredAds
{
    public function execute(array $data)
    {
        $query = new Ad;
        $locationGeometry = null;

        if (isset($data['longitude']) && isset($data['latitude'])) {
            $data['location'] = [$data['latitude'], $data['longitude']];
            $locationGeometry = new Point(...$data['location']);
            $query = $query->orderByDistanceSphere('location', $locationGeometry, 'asc');
            $query = $query->orderBy('created_at', 'desc');
            $query = $query->select(DB::raw("*, ST_Distance_Sphere(location, point(".$data['longitude'].",".$data['latitude'].")) as calcDistance"));
        } else {
            $query = $query->orderBy('created_at', 'desc');
        }

        if (isset($data['search'])) {
            $query = $query->where('title', 'like', '%' . $data['search'] . '%')
                ->orWhere('city', 'like', '%' . $data['search'] . '%')
                ->orWhere('description', 'like', '%' . $data['search'] . '%');
        }

        if (isset($data['distance']) && $data['distance'] > 10 && $locationGeometry) {
            $query = $query->distanceSphere('location', $locationGeometry, (int) $data['distance']);
        }

        if (isset($data['type'])) {
            $query = $query->where('type', $data['type']);
        }

        return $query->paginate(25);
    }
}
