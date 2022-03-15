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

Route::get('/', [AdController::class, 'index'])->name('home');
Route::get('/{ad:slug}', [AdController::class, 'show'])->name('ad.show');

Route::get('session-language/{lang}', [SessionLanguageController::class, 'update'])->name('sessions.languages.update');
Route::get('autocomplete','AutocompleteController@locationAutoComplete');

Route::get('/privacy', function () { return view('privacy'); })->name('privacy');
Route::get('/cookies', function () { return view('cookies'); })->name('cookies');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/rules', function () { return view('rules'); })->name('rules');
Route::get('/terms-of-use', function () { return view('terms-of-use'); })->name('terms-of-use');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
