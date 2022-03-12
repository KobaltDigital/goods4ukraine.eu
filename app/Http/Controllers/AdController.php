<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actions\Ads\GetFilteredAds;

class AdController extends Controller
{
    public function index(Request $request, GetFilteredAds $getFilteredAds)
    {
        $data = $request->all();
        $ads = $getFilteredAds->execute($data);
        $currentLocation = '';

        return view('home', compact('ads'));
    }
}
