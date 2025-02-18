<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('front.home');
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});
Route::get('/admin/products', function () {
    return view('admin.products');
})->name('products.index');
Route::get('/admin/add_products', function () {
    return view('admin.add');
})->name('products.add');
Route::get('/admin/category', function () {
    return view('admin.category.index');
})->name('category.index');
Route::get('/admin/add_category', function () {
    return view('admin.addcategory');
});


Route::resource('products', ProductController::class); 
Route::post('/upload-images', [ProductController::class, 'uploadImages'])->name('products.uploadImages');

Route::resource('category', CategoryController::class);
