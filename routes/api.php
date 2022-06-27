<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


Route::get('/ads', [ApiController::class, 'ads'])->name('api.ads');

Route::get('/categories', [ApiController::class, 'categories'])->name('api.categories');
