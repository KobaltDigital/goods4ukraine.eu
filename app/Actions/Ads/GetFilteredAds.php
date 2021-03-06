<?php

namespace App\Actions\Ads;

use App\Models\Ad;
use Illuminate\Support\Facades\DB;
use Grimzy\LaravelMysqlSpatial\Types\Point;

class GetFilteredAds
{
    public function execute(array $data, $paginate = 25)
    {
        $query = new Ad();
        $locationGeometry = null;

        if (isset($data['longitude']) && isset($data['latitude'])) {
            $data['location'] = [$data['latitude'], $data['longitude']];
            $locationGeometry = new Point(...$data['location']);
            $query = $query->orderByDistanceSphere('location', $locationGeometry, 'asc');
            $query = $query->orderBy('created_at', 'desc');
            $query = $query->select(DB::raw("*, ST_Distance_Sphere(location, point(" . $data['longitude'] . "," . $data['latitude'] . ")) as calcDistance"));
        } else {
            $query = $query->orderBy('created_at', 'desc');
        }

        if (isset($data['search'])) {
            $query = $query->where(function($q)use ($data) {
               $q->where('title', 'like', '%' . $data['search'] . '%')
               ->orWhere('city', 'like', '%' . $data['search'] . '%')
               ->orWhere('translated_title', 'like', '%' . $data['search'] . '%')
               ->orWhere('translated_description', 'like', '%' . $data['search'] . '%')
               ->orWhere('description', 'like', '%' . $data['search'] . '%');
          });
        }

        if (isset($data['distance']) && $data['distance'] > 10 && $locationGeometry) {
            $query = $query->distanceSphere('location', $locationGeometry, (int) $data['distance']);
        }

        if (isset($data['type'])) {
            $query = $query->where(function($q)use ($data) {
                $q->where('type', $data['type']);
            });
        }

        if (isset($data['category'])) {
            $query = $query->whereHas('categories', function ($query) use ($data) {
                return $query->where('id', $data['category']);
            });
        }
        
        return $query->paginate($paginate);
    }
}
