<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
