<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\servicesController;
use App\Http\Controllers\devicesitesController;
use App\Http\Controllers\usersController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('inventory', [App\Http\Controllers\pageController::class,'inventory'])-> name('inventory');
////
Route::get('connectivity', [App\Http\Controllers\pageController::class,'connectivity'])-> name('connectivity');
////
//Route::resource("service","servicesController");
Route::resource("users",usersController::class);
Route::get("users_delete/{id}",[App\Http\Controllers\usersController::class,'destroy'])-> name('users_delete/{id}');;

Route::resource('services', servicesController::class);
Route::resource('devicesites', devicesitesController::class);
