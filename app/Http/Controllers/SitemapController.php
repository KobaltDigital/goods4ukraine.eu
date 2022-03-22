<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index(Request $request)
    {
        $ads = Ad::orderBy('id', 'desc')->get();
        return response()->view('sitemap', compact('ads'))->header('Content-Type', 'text/xml');
    }
}
