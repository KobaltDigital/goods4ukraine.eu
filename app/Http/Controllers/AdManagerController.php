<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAdRequest;
use App\Actions\Ads\GetOwnAds;
use App\Enums\AdTypeEnum;
use App\Actions\Ads\CreateAd;
use App\Actions\Ads\UpdateAd;
use App\Actions\GetClientLocation;
use App\Actions\Ads\GetFilteredAds;

class AdManagerController extends Controller
{
    public function index(
        Request $request,
        GetOwnAds $getOwnAds
    ) {
        $ads = $getOwnAds->execute();
        return view('admin.ad.index', compact('ads'));
    }

    public function reserved(Request $request)
    {   
        $ads = Ad::onlyTrashed()->paginate();

        return view('admin.ad.archive', compact('ads'));
    }

    public function create()
    {
        $adTypes = AdTypeEnum::toArray();

        return view('admin.ad.create-or-edit', compact('adTypes'));
    }

    public function store(StoreAdRequest $request, CreateAd $createAd)
    {

        $ad = $createAd->execute($request->validated(), auth()->user());

        if(count($request->files) > 0) {
            $ad->addMedia($request['file-upload']->path())
               ->toMediaCollection('images');
        }

        return redirect()->route('admin.ads.index')->withSuccess(__('Saved.'));
    }

    public function edit(Ad $ad)
    {
        if ($ad->user_id !== auth()->user()->id) {
            return abort(403);
        }

        $adTypes = AdTypeEnum::toArray();

        return view('admin.ad.create-or-edit', compact('ad','adTypes'));
    }

    public function update(StoreAdRequest $request, UpdateAd $updateAd, Ad $ad)
    {

        if ($ad->user_id !== auth()->user()->id) {
            return abort(403);
        }
        $updateAd->execute($ad, $request->validated());

        if(count($request->files) > 0) {
            $ad->media()->delete();
            $ad->addMedia($request['file-upload']->path())
               ->toMediaCollection('images');
        }

        return redirect()->route('admin.ads.index')->withSuccess(__('Activated'));
    }

    public function activate($id)
    {
        $ad = Ad::withTrashed()->findOrFail($id);

        if ($ad->user_id !== auth()->user()->id) {
            return abort(403);
        }

        $ad->restore();

        return redirect()->route('admin.ads.index')->withSuccess(__('Activated'));
        ;
    }

    public function reserve(Ad $ad)
    {
        if ($ad->user_id !== auth()->user()->id) {
            return abort(403);
        }

        $ad->delete();

        return redirect()->route('admin.ads.index')->withSuccess(__('Reserved'));
    }

    public function destroy(Ad $ad)
    {
        if ($ad->user_id !== auth()->user()->id) {
            return abort(403);
        }

        $ad->forceDelete();

        return redirect()->route('admin.ads.index')->withSuccess(__('Deleted'));
    }
}
