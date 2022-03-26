<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionLanguageController extends Controller
{
    public function update(Request $request)
    {
        $request->session()->put('language', $request->lang);
        if (Auth::user()) {
            Auth::user()->lang = $request->lang;
            Auth::user()->save();
        }
        return redirect()->back();
    }
}
