<?php

use App\Http\Controllers\ExistenciaController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\MovimientoDetalleController;
use App\Http\Controllers\TitemController;
use App\Models\Titem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//rutas para los items
Route::resource('inventarios/items',ItemController::class)
->names('inventarios.items');
Route::resource('inventarios/marcas',MarcaController::class)
->names('inventarios.marcas');
Route::resource('inventarios/titems',TitemController::class)
->names('inventarios.titems');
//rutas para los movimientos
Route::resource('inventarios/movimientos',MovimientoController::class)
->names('inventarios.movimientos');
Route::resource('inventarios/movimientos/detalles',MovimientoDetalleController::class)
->names('inventarios.movimientos.detalles');
//rutas para saber las existencias
Route::resource('inventarios/existencias',ExistenciaController::class)
->names('inventarios.existencias');



Route::get('clear-cache',function(){
   echo Artisan::call('cache:clear');
   echo Artisan::call('config:clear');
   echo Artisan::call('config:cache');
});
