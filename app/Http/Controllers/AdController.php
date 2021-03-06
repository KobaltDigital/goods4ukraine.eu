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

        $sortedBy = isset($data['location'])
            ? 'nearest'
            : 'created_at';

        return view('home', compact('ads', 'location', 'sortedBy'));
    }

    public function map(
        Request $request,
        GetFilteredAds $getFilteredAds,
        GetClientLocation $getClientLocation
    ) {
        $data = $request->all();
        $location = $getClientLocation->execute($data);
        $ads = $getFilteredAds
            ->execute($data, 1000)
            ->whereNotNull('location')
            ->groupBy('locationPair');

        $sortedBy = isset($data['location'])
            ? 'nearest'
            : 'created_at';

        return view('map', compact('ads', 'location', 'sortedBy'));
    }

    public function show(Request $request, Ad $ad)
    {
        return view('ad.show', compact('ad'));
    }
}
