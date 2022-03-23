<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Actions\GetClientLocation;
use App\Actions\Ads\GetFilteredAds;

class AdController extends Controller
{
    public function index(
        Request $request,
        GetFilteredAds $getFilteredAds,
        GetClientLocation $getClientLocation
    ) {
        $data = $request->all();
        $location = $getClientLocation->execute($data);
        $ads = $getFilteredAds->execute($data);
        $currentLocation = '';

        $sortedBy = 'created_at';
        if(isset($data['location'])) {
            $sortedBy = 'nearest';
        }

        return view('home', compact('ads', 'location','sortedBy'));
    }

    public function show(Request $request, Ad $ad)
    {
        return view('ad.show', compact('ad'));
    }
}
