<?php

namespace App\Http\Controllers;

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

        return view('home', compact('ads', 'location'));
    }
}
