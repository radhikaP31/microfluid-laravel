<?php

use Illuminate\Support\Facades\Route;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndustriesController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\Auth\LoginController;
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

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'home')->name('home'); //Display Home Page
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
    Route::get('/product/{slug?}', 'singleProduct')->name('product'); //Display single product data
});

Route::controller(BlogsController::class)->group(function () {
    Route::get('/blogs', 'getBlog')->name('blogs'); //Display all blogs data
});

Route::controller(BlogsController::class)->group(function ($id = null) {
    Route::get('/blog/{slug?}', 'getBlog')->name('blog'); //Display single blog data
});

Route::controller(IndustriesController::class)->group(function () {
    Route::get('/industries', 'getIndustry')->name('industries'); //Display all industry data
});

Route::controller(IndustriesController::class)->group(function ($slug = '') {
    Route::get('/industry/{slug?}', 'getIndustry')->name('industry'); //Display display single industry data
});

Route::controller(InquiryController::class)->group(function () {
    Route::any('/inquiry/selectState/{countryId}','getAllState')->name('ajax.selectState');
    Route::get('/inquiry', 'add')->name('inquiry'); //Display inquiry form
    Route::any('/inquiry/add', 'create')->name('inquiry_add'); //Create inquiry
});

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'index')->name('contact'); //Display contact page
    Route::any('/contact/add', 'create')->name('contact_add'); //Create contact
});

//Admin Routes start
Route::get('dashboard', [LoginController::class, 'dashboard']); 
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.verify'); 
Route::get('registration', [LoginController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [LoginController::class, 'signOut'])->name('signout');
//Admin Routes end
