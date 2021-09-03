<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

