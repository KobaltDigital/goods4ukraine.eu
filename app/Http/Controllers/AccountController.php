<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccountController extends Controller
{

    public function edit(Request $request)
    {
        return view('auth.edit');
    }

    public function update(Request $request, User $user)
    {

        return redirect()->route('admin.profile.edit')->withSuccess(__('Edited'));
    }
}
