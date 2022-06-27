<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\AdResource;
use App\Actions\Ads\GetFilteredAds;
use App\Http\Resources\CategoryResource;

class ApiController extends Controller
{
    public function ads(
        Request $request,
        GetFilteredAds $getFilteredAds
    ) {
        $data = $request->all();
        $ads = $getFilteredAds->execute($data);

        foreach($ads as $key => $ad) {
            $ads[$key]['media']['medium'] = $ad->getFirstMediaUrl('images', 'medium');
            $ads[$key]['category'] = $ad->category;
        }
        return AdResource::collection($ads);
    }

    public function categories() {
        return CategoryResource::collection(Category::all());
    }
}