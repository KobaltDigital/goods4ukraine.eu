<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Actions\Ads\Contact;
use App\Http\Requests\ContactOwnerRequest;

class AdContactController extends Controller
{
    public function update(ContactOwnerRequest $request, Ad $ad, Contact $contact)
    {
        $contact->execute($request->all(), $ad);

        return redirect()->route('ads.show', $ad)->withSuccess(__('Message send'));
    }
}
