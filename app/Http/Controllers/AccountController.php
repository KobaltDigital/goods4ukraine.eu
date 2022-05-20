<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function edit(Request $request)
    {
        return view('auth.edit');
    }

    public function update(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|max:255',
            'email' => [
                'required',
                'email',
                'unique:users,email,' . auth()->user()->id,
            ],
            'phone' => '',
            'show_full_address' => '',
            'show_email' => '',
            'show_phone' => '',
            'type' => '',
        ]);

        auth()->user()->update($data);

        return redirect()->route('admin.profile.edit')->withSuccess(__('Saved.'));
    }

    public function delete(Request $request)
    {
        //anonymize user
        $authUser = auth()->user();
        $data = [
            'name' => str_shuffle($authUser->name),
            'email' => str_shuffle($authUser->email),
            'phone' => '',
            'show_full_address' => '',
            'show_email' => '',
            'show_phone' => '',
            'type' => '',
        ];
        auth()->user()->update($data);

        //delete users ads
        $ads = auth()->user()->ads;
        if($ads)
        {
            foreach($ads as $ad)
            {
                $ad->delete();
            }
        }

        //delete user
        auth()->user()->delete();

        //logout and delete session data
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->withSuccess(__('Account deleted.'));
    }
}
