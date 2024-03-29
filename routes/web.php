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
use App\Http\Controllers\MasterController;

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
    Route::get('/about-us', 'index')->name('about'); //Display About Page
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/product/{id?}/{sub_cat_id?}', 'allProduct')->name('product'); //Display product data
});

/* Route::controller(ProductController::class)->group(function ($id = 1) {
    Route::get('/product/{product:slug?}', 'singleProduct')->name('product'); //Display practice data
});

Route::get('/product/{product:slug?}', [ProductController::class, 'singleProduct'])
        ->name('product'); */

Route::controller(ProductController::class)->group(function ($slug = null) {
    Route::get('/products/{slug?}', 'singleProduct')->name('products'); //Display single product data
});

/* Route::controller(BlogsController::class)->group(function () {
    Route::get('/blogs', 'getBlog')->name('blogs'); //Display all blogs data
});

Route::controller(BlogsController::class)->group(function ($id = null) {
    Route::get('/blog/{slug?}', 'getBlog')->name('blog'); //Display single blog data
}); */

Route::controller(IndustriesController::class)->group(function () {
    Route::get('/industries', 'getIndustry')->name('industries'); //Display all industry data
    Route::get('/download', 'getDownload')->name('download'); //Display download data
});

Route::controller(IndustriesController::class)->group(function ($slug = '') {
    Route::get('/industry/{slug?}', 'getIndustry')->name('industry'); //Display single industry data
});

/* Route::controller(InquiryController::class)->group(function () {
    Route::any('/inquiry/selectState/{countryId}','getAllState')->name('ajax.selectState');
    Route::get('/inquiry', 'add')->name('inquiry'); //Display inquiry form
    Route::post('/inquiry/add', 'create')->name('inquiry_add'); //Create inquiry
}); */

Route::controller(ContactController::class)->group(function () {
    Route::get('/contact-us', 'index')->name('contact'); //Display contact page
    Route::post('/contact/add', 'create')->name('contact_add'); //Create contact
    Route::post('/contact/quoteAdd', 'quoteAdd')->name('quote_add'); //Request quote
});

//Admin Routes start
// Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard'); 
// Route::get('login', [LoginController::class, 'index'])->name('login');
// Route::post('custom-login', [LoginController::class, 'customLogin'])->name('login.verify'); 
// Route::get('registration', [LoginController::class, 'registration'])->name('register-user');
// Route::post('custom-registration', [LoginController::class, 'customRegistration'])->name('register.custom'); 
// Route::get('signout', [LoginController::class, 'signOut'])->name('signout');

// Route::controller(MasterController::class)->group(function () {
//     Route::get('/common-type', 'index')->name('common_type_list'); //Display contact page
//     Route::any('/common-type/add', 'create')->name('common_type_add'); //Create common-type
//     Route::any('/common-type/edit/{id}', 'create')->name('common_type_edit'); //Edit common-type
//     Route::get('/common-type/delete/{id}', 'delete')->name('common_type_delete'); //Delete common-type
// });
//Admin Routes end
