<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Category;
use App\Enums\AdTypeEnum;
use Illuminate\Http\Request;
use App\Actions\Ads\CreateAd;
use App\Actions\Ads\UpdateAd;
use App\Actions\Ads\GetOwnAds;
use App\Actions\GetClientLocation;
use App\Actions\Ads\GetFilteredAds;
use App\Http\Requests\StoreAdRequest;

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

        $categories = Category::all()->pluck('name', 'id');

        return view('admin.ad.create-or-edit', compact('adTypes', 'categories'));
    }

    public function store(StoreAdRequest $request, CreateAd $createAd)
    {
        $ad = $createAd->execute($request->validated(), auth()->user());

        if (count($request->files) > 0) {
            $ad->addMedia($request['file-upload']->path())
               ->toMediaCollection('images');
        }

        return redirect()->route('admin.ads.index')->withSuccess(__('Saved.'));
    }

    public function edit(Ad $ad)
    {
        if (!auth()->user()->admin && $ad->user_id !== auth()->user()->id) {
            return abort(403);
        }

        $adTypes = AdTypeEnum::toArray();

        $categories = Category::all()->pluck('name', 'id');

        return view('admin.ad.create-or-edit', compact('ad', 'adTypes', 'categories'));
    }

    public function update(StoreAdRequest $request, UpdateAd $updateAd, Ad $ad)
    {

        if (!auth()->user()->admin && $ad->user_id !== auth()->user()->id) {
            return abort(403);
        }

        $updateAd->execute($ad, $request->validated());

        if (count($request->files) > 0) {
            $ad->media()->delete();
            $ad->addMedia($request['file-upload']->path())
               ->toMediaCollection('images');
        }

        return redirect()->route('admin.ads.index')->withSuccess(__('Activated'));
    }

    public function activate($id)
    {
        $ad = Ad::withTrashed()->findOrFail($id);

        if (!auth()->user()->admin && $ad->user_id !== auth()->user()->id) {
            return abort(403);
        }

        $ad->restore();

        return redirect()->route('admin.ads.index')->withSuccess(__('Activated'));
        ;
    }

    public function reserve(Ad $ad)
    {
        if (!auth()->user()->admin && $ad->user_id !== auth()->user()->id) {
            return abort(403);
        }

        $ad->delete();

        return redirect()->route('admin.ads.index')->withSuccess(__('Reserved'));
    }

    public function destroy(Ad $ad)
    {
        if (!auth()->user()->admin && $ad->user_id !== auth()->user()->id) {
            return abort(403);
        }

        $ad->categories()->detach();
        $ad->forceDelete();

        return redirect()->route('admin.ads.index')->withSuccess(__('Deleted'));
    }
}
