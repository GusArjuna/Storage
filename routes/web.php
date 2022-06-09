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
    Route::get('/formin', 'formi');
});
Route::controller(OutstuffController::class)->group(function () {
    Route::get('/stuffout', 'index');
    Route::get('/formout', 'formo');
});
Route::controller(StuffController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/codestuff', 'codest');
    Route::get('/{stuff}', 'show');
});
