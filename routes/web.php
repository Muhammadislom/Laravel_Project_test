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
//Route::get('/', 'IndexController');
Route::group(['namespace' => 'Front', 'middleware' => ['auth']], function () {
    Route::get('/', 'IndexController')->name('home');
    Route::post('/', 'StoreController')->name('user.store.application');
});
    Route::group(['namespace' => 'Manager','prefix' => 'manager', 'middleware' => ['auth', 'manager']], function () {
    Route::get('/', 'IndexController')->name('manager');
    Route::patch('/{application}', 'UpdateController')->name('application.update.status');
});
