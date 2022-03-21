<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Notifications\ContactOwner;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactOwnerRequest;
use App\Mail\OwnerContacted;

class AdContactController extends Controller
{
    public function update(ContactOwnerRequest $request, Ad $ad)
    {
        Mail::to($ad->user)->send(new OwnerContacted($request->all(), $ad));

        return redirect()->route('ads.show', $ad)->withSuccess(__('Message send'));
    }
}
