<?php

use Illuminate\Support\Facades\Route;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogsController;
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
    Route::get('/', 'index')->name('home'); //Display Home Page
});

Route::controller(AboutController::class)->group(function () {
    Route::get('/about', 'index')->name('about'); //Display About Page
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/products/{id?}/{sub_cat_id?}', 'allProduct')->name('products'); //Display product data
});

/* Route::controller(ProductController::class)->group(function ($id = 1) {
    Route::get('/product/{product:slug?}', 'singleProduct')->name('product'); //Display practice data
});

Route::get('/product/{product:slug?}', [ProductController::class, 'singleProduct'])
        ->name('product'); */

Route::controller(ProductController::class)->group(function ($slug = null) {
    Route::get('/product/{slug?}', 'singleProduct')->name('product'); //Display practice data
});

Route::controller(BlogsController::class)->group(function () {
    Route::get('/blog', 'getBlog')->name('blog'); //Display practice data
});

Route::controller(BlogsController::class)->group(function ($id = null) {
    Route::get('/blog/{slug?}', 'getBlog')->name('blogs'); //Display practice data
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