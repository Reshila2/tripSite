<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\IndexController;
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
    return view('welcome');
});

Route::get('/index/{cat_id}', [App\Http\Controllers\IndexController::class, 'show']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/category/{category}','PostContorller@pc')->name('articlesByCategory');
Route::get('/cart/{id}',[App\Http\Controllers\CartController::class,'cart'])->name('mainPage.cart');
Route::post('/cart/{id}',[App\Http\Controllers\CartController::class,'addData']);
Route::get('/show/{id}',[App\Http\Controllers\CardController::class,'postCategory']);
Route::get('/index',[PostController::class,'show']);
Route::get('/category/{id}',[IndexController::class,'categoryPost']);
Route::middleware(['role:admin'])->prefix('adminPanel')->group( function () {
    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('adminPanel');

    Route::resource('category', CategoryController::class);
    Route::resource('post', PostController::class);
    Route::resource('message', ContactController::class);
    Route::resource('order',OrderController::class);
    Route::get('/order',[OrderController::class, 'fields'])->name('order.fields');
//    Route::get('/order/{id}',[OrderController::class,'fields'])->name('order.fields');
});







