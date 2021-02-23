<?php

use App\Http\Controllers\FcabController;
use App\Http\Controllers\FcabInterfaceController;
use App\Http\Controllers\FcabSplitterController;
use App\Http\Controllers\FcabSplitterInterfaceController;
use App\Http\Controllers\FdpsInterfaceController;
use App\Http\Controllers\FdpSplitterController;
use App\Http\Controllers\FdpSplitterInterfaceController;
use App\Http\Controllers\FidpsInterfaceController;
use App\Http\Controllers\FidpSplitterController;
use App\Http\Controllers\FidpSplitterInterfaceController;
use App\Http\Controllers\OdfInterfaceController;
use App\Http\Controllers\OdfRackController;
use App\Http\Controllers\OltController;
use App\Http\Controllers\OltInterfaceController;
use App\Http\Controllers\RegionsController;
use App\Http\Controllers\ServiceViewController;
use App\Models\FidpsInterface;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\servicesController;
use App\Http\Controllers\devicesitesController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\ServiceRouteController;
use App\Http\Controllers\FidpController;
use App\Http\Controllers\FdpController;
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

Route::resource('services', ServicesController::class);
Route::resource('devicesites', devicesitesController::class);
Route::resource('regions', RegionsController::class);

Route::resource('serviceRoute', ServiceRouteController::class);

Route::resource('fidp', FidpController::class);

Route::resource('fdp', FdpController::class);
Route::get('fdp/delete/{id}', [FdpController::class, 'delete'])->name('fdp');

Route::resource('fidps_interface', FidpsInterfaceController::class);

Route::resource('fdps_interface', FdpsInterfaceController::class);

Route::resource('fcab', FcabController::class);
Route::get('fcab/delete/{id}', [FcabController::class, 'delete'])->name('fcab');


Route::resource('fcabs_interface', FcabInterfaceController::class);

Route::resource('fcabs_splitter', FcabSplitterController::class);
Route::get('fcabs_splitter/delete/{id}', [FcabSplitterController::class, 'delete'])->name('fcab_splitter');

Route::resource('fcab_splitter_interface', FcabSplitterInterfaceController::class);

Route::resource('odf_racks', OdfRackController::class);
Route::get('odf_racks/delete/{id}', [OdfRackController::class, 'delete'])->name('odf');

Route::resource('odf_interfaces', OdfInterfaceController::class);

Route::resource('olts', OltController::class);
Route::get('olts/delete/{id}', [OltController::class, 'delete'])->name('olt');

Route::resource('olt_interfaces', OltInterfaceController::class);
Route::get('olt_interfaces/delete/{id}', [OltInterfaceController::class, 'delete'])->name('olt_interfaces');

Route::resource('fdp_splitters', FdpSplitterController::class);
Route::get('fdp_splitters/delete/{id}', [FdpSplitterController::class, 'delete'])->name('fdp_splitter');

Route::resource('fdp_splitter_interfaces', FdpSplitterInterfaceController::class);

Route::resource('fidp_splitters', FidpSplitterController::class);

Route::resource('fidp_splitter_interfaces', FidpSplitterInterfaceController::class);

Route::resource('service_view', ServiceViewController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
