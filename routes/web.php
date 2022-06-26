<?php

use Illuminate\Support\Facades\Route;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
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

Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'index')->name('home'); //Display practice data
});

Route::controller(AboutController::class)->group(function () {
    Route::get('/about', 'index')->name('about'); //Display practice data
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'allProduct')->name('products'); //Display practice data
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products/{id}', 'singleProduct')->name('product'); //Display practice data
});


//Route group for IndexController index page
/*Route::controller(IndexController::class)->group(function () {
    Route::get('/', 'index')->name('home'); //Display practice data
});*/

//Route group for AboutController about page
/*Route::controller(AboutController::class)->group(function () {
    Route::get('/about', 'index'); //Display practice data
});*/

/*Route::get('/', function () {
    return view('index');
});*/