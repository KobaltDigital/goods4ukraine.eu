<?php

use App\Http\Controllers\AdController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionLanguageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AdController::class, 'index'])->name('ads.index');

Route::get('session-language/{lang}', [SessionLanguageController::class, 'update'])->name('sessions.languages.update');

Route::get('/privacy', function () { return view('pages.privacy'); })->name('privacy');
Route::get('/cookies', function () { return view('pages.cookies'); })->name('cookies');
Route::get('/about', function () { return view('pages.about'); })->name('about');
Route::get('/rules', function () { return view('pages.rules'); })->name('rules');
Route::get('/contact', function () { return view('pages.contact'); })->name('contact');
Route::get('/press', function () { return view('pages.press'); })->name('press');
Route::get('/terms-of-use', function () { return view('pages.terms-of-use'); })->name('terms-of-use');

Route::get('autocomplete', 'AutocompleteController@locationAutoComplete');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::get('/{ad:slug}', [AdController::class, 'show'])->name('ad.show');
