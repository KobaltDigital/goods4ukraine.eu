<?php

namespace App\Actions\Ads;

use App\Models\Ad;
use Grimzy\LaravelMysqlSpatial\Types\Point;

class GetOwnAds
{
    public function execute()
    {
        $query = Ad::withTrashed()
            ->where('user_id', '=', auth()->user()->id)
            ->orderBy('created_at');

        return $query->paginate(25);
    }
}
