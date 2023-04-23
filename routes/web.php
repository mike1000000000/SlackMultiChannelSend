<?php

use App\Http\Controllers\ChannelsController;
use App\Http\Controllers\SendController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\TokensController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
        Route::get('sendmessages', [SendController::class,'index'])->name('sendmessages');
        Route::get('/about', function () { return view('about'); })->name('about');
        Route::get('/', [SendController::class,'index'])->name('sendmessages');
        Route::get('tokens', [TokensController::class,'index'])->name('tokens');
        Route::resource('settings', SettingsController::class)->only(['index', 'store']);;
        Route::resource('templates', TemplateController::class);
        Route::resource('channels', ChannelsController::class)->only(['index', 'store', 'show', 'edit', 'destroy']);
});
