<?php

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

Route::get('/admin',[App\Http\Controllers\AdminController::class,'view']);



Route::get('/category',[App\Http\Controllers\CategoryController::class,'index'])->name('category.index');

Route::post('/category/store',[App\Http\Controllers\CategoryController::class,'store'])->name('category.store');

Route::get('/category/edit/{cat_id}',[App\Http\Controllers\CategoryController::class,'edit'])->name('category.edit');

Route::post('/category/edit',[App\Http\Controllers\CategoryController::class,'update'])->name('category.update');

Route::get('/categories/delete/{cat_id}',[App\Http\Controllers\CategoryController::class,'Delete']);

Route::get('/categories/inactive/{cat_id}',[App\Http\Controllers\CategoryController::class,'Inactive']);

Route::get('/categories/active/{cat_id}',[App\Http\Controllers\CategoryController::class,'Active']);