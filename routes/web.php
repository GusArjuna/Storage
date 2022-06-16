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
    Route::get('/stuffin/{instuff}/edit', 'edit');
    Route::delete('/stuffin/{instuff}', 'destroy');
    Route::patch('/stuffin/{instuff}', 'update');
});
Route::controller(OutstuffController::class)->group(function () {
    Route::get('/stuffout', 'index');
    Route::get('/stuffout/formout', 'create');
    Route::post('/stuffout/formout', 'store');
    Route::get('/stuffout/{outstuff}/edit', 'edit');
    Route::delete('/stuffout/{outstuff}', 'destroy');
    Route::patch('/stuffout/{outstuff}', 'update');
});
Route::controller(StuffController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/codestuff', 'create');
    Route::post('/codestuff', 'store');
    Route::get('/{stuff}/edit', 'edit');
    Route::delete('/{stuff}', 'destroy');
    Route::patch('/{stuff}', 'update');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/register', function () {
    return view('register');
});
Route::get('/forgot', function () {
    return view('forgot');
});