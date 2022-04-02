<?php

namespace App\Actions\Ads;

use App\Models\Ad;
use Grimzy\LaravelMysqlSpatial\Types\Point;

class GetOwnAds
{
    public function execute()
    {
        $query = Ad::withTrashed()
        ->orderBy('created_at','desc');

        if(!auth()->user()->admin) {
            $query = $query->where('user_id', '=', auth()->user()->id);
        }

        return $query->paginate(25);
    }
}
