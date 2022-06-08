<?php

use App\Models\Stuff;
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

Route::get('/', function () {
    return view('home',[
        "title" => "Dashboard",
        "datum" => "s"
    ]);
});
Route::get('/stuffin', function () {
    return view('stuffin',[
        "title" => "Stuff IN"
    ]);
});
Route::get('/stuffout', function () {
    return view('stuffout',[
        "title" => "Stuff OUT"
    ]);
}); 