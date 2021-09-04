<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
use App\Http\Controllers\RegisterChannelController;
use App\Http\Controllers\WatchChannelController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'top'], function () {
    Route::get('index',[TopController::class, 'index'])->name('top.index');
    Route::get('result',[TopController::class, 'result'])->name('top.result');
    Route::get('watch/{id}',[TopController::class, 'watch'])->name('top.watch');
});

Route::group(['prefix' => 'registerchannel'], function () {
    Route::get('index',[RegisterChannelController::class, 'index'])->name('regch.index');
    Route::get('create',[RegisterChannelController::class, 'create'])->name('regch.create');
    Route::get('store/{id}',[RegisterChannelController::class, 'store'])->name('regch.store');
    Route::get('show/{id}',[RegisterChannelController::class, 'show'])->name('regch.show');
    Route::get('destroy/{id}',[RegisterChannelController::class, 'destroy'])->name('regch.destroy');
});

Route::group(['prefix' => 'watchchannel'], function () {
    Route::get('index',[WatchChannelController::class, 'index'])->name('watch.index');
    Route::get('result',[WatchChannelController::class, 'result'])->name('watch.result');
    Route::get('watch/{id}',[WatchChannelController::class, 'watch'])->name('watch.watch');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

