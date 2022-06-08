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
Route::get('/formin', function () {
    return view('formin',[
        "title" => "Incoming Data"
    ]);
}); 
Route::get('/formout', function () {
    return view('formout',[
        "title" => "Stuff Out"
    ]);
}); 
Route::get('/codestuff', function () {
    return view('codestuff',[
        "title" => "Code Stuff"
    ]);
}); 