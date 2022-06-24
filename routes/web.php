<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Route group for IndexController index page
Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'index'); //Display practice data
});

//Route group for AboutController about page
Route::controller(AboutController::class)->group(function () {
    Route::get('/about', 'index'); //Display practice data
});

/*Route::get('/', function () {
    return view('index');
});*/