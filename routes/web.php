<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AdContactController;
use App\Http\Controllers\AdManagerController;
use App\Http\Controllers\SitemapController;
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

Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::view('/cookies', 'pages.cookies')->name('cookies');
Route::view('/about', 'pages.about')->name('about');
Route::view('/rules', 'pages.rules')->name('rules');
Route::view('/contact', 'pages.contact')->name('contact');
Route::view('/press', 'pages.press')->name('press');
Route::view('/terms-of-use', 'pages.terms-of-use')->name('terms-of-use');

Route::get('sitemap.xml',[SitemapController::class, 'index']);

Route::middleware('auth')->group(function () {

    Route::get('/admin/profile', [AccountController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/admin/profile', [AccountController::class, 'update'])->name('admin.profile.update');

    Route::get('/admin', [AdManagerController::class, 'index'])->name('admin.ads.index');
    Route::get('/admin/ads/reserved', [AdManagerController::class, 'reserved'])->name('admin.ads.reserved');
    Route::get('/admin/ads/{ad}/edit', [AdManagerController::class, 'edit'])->name('admin.ads.edit');
    Route::put('/admin/ads/{ad}', [AdManagerController::class, 'update'])->name('admin.ads.update');
    Route::get('/admin/ads/create', [AdManagerController::class, 'create'])->name('admin.ads.create');
    Route::post('/admin/ads/', [AdManagerController::class, 'store'])->name('admin.ads.store');

    Route::put('/admin/ads/{id}/activate', [AdManagerController::class, 'activate'])->name('admin.ads.activate');

    // moved 2 get because otherwise e-mail links doenst work //
    Route::get('/admin/ads/{ad}/reserve', [AdManagerController::class, 'reserve'])->name('admin.ads.reserve');
    Route::get('/admin/ads/{ad}', [AdManagerController::class, 'destroy'])->name('admin.ads.destroy');

});

require __DIR__ . '/auth.php';

Route::get('/{ad:slug}', [AdController::class, 'show'])->name('ads.show');
Route::post('/{ad:slug}/contact', [AdContactController::class, 'update'])->name('ads.contact');
