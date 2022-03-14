<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Session;

class SessionLanguageController extends Controller
{
    public function update(Request $request)
    {
        $request->session()->put('language', $request->lang);
        return redirect()->back();
    }
}
