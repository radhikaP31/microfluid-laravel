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
| Breadcrumb Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Breadcrumbs::for('home', function (BreadcrumbTrail $trail): void {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('about', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('about', route('about'));
});

Breadcrumbs::for('products', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Products', route('product', 1));
});

Breadcrumbs::for('product', function (BreadcrumbTrail $trail, $name): void {
    $trail->parent('products');
    $trail->push($name, route('products', 'mf320-homogenizer'));
});

Breadcrumbs::for('blogs', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Blogs', route('blogs'));
});

Breadcrumbs::for('blog', function (BreadcrumbTrail $trail): void {
    $trail->parent('blogs');
    $trail->push('Blog', route('blog'));
});

Breadcrumbs::for('industries', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Industries', route('industries'));
});

Breadcrumbs::for('download', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Download', route('download'));
});

Breadcrumbs::for('industry', function (BreadcrumbTrail $trail): void {
    $trail->parent('industries');
    $trail->push('Industry', route('industry'));
});

Breadcrumbs::for('inquiry', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Inquiry', route('inquiry'));
});

Breadcrumbs::for('contact', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Contact', route('contact'));
});

?>