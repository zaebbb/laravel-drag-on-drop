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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'category', 'as' => 'category.'], function () {

    Route::get('/', [App\Http\Controllers\CategoryController::class, 'index'])->name('index');

    Route::get('setting', [App\Http\Controllers\CategoryController::class, 'settingIndex'])->name('setting.index')->middleware('auth');
    Route::post('setting', [App\Http\Controllers\CategoryController::class, 'settingSave'])->name('setting.save')->middleware('auth');

});
