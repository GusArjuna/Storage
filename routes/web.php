<?php

use App\Http\Controllers\InstuffController;
use App\Http\Controllers\OutstuffController;
use App\Http\Controllers\StuffController;
use Illuminate\Support\Facades\Route;

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

Route::controller(InstuffController::class)->group(function () {
    Route::get('/stuffin', 'index');
    Route::get('/stuffin/formin', 'create');
    Route::post('/stuffin/formin', 'store');
    Route::get('/stuffin/{stuff}', 'show');
    Route::get('/stuffin/del/{stuff}', 'destroy');
});
Route::controller(OutstuffController::class)->group(function () {
    Route::get('/stuffout', 'index');
    Route::get('/stuffout/formout', 'create');
    Route::post('/stuffout/formout', 'store');
    Route::get('/stuffout/{stuff}', 'show');
    Route::get('/stuffout/del/{stuff}', 'destroy');
});
Route::controller(StuffController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/codestuff', 'create');
    Route::post('/codestuff', 'store');
    Route::get('/{stuff}', 'show');
    Route::get('/del/{stuff}', 'destroy');
});
