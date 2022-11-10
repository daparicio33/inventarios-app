<?php

use App\Http\Controllers\AlmaceneController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\EncargadoController;
use App\Http\Controllers\ExistenciaController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\MovimientoDetalleController;
use App\Http\Controllers\TitemController;
use App\Http\Controllers\TmovimientoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
//rutas para administrar el perfil
Route::get('user/settings',function(){
   return Redirect::route('administrador.usuarios.edit',auth()->id());
})->name('user.settings');

//rutas para los items
Route::resource('inventarios/items',ItemController::class)
->names('inventarios.items');
Route::resource('inventarios/marcas',MarcaController::class)
->names('inventarios.marcas');
Route::resource('inventarios/titems',TitemController::class)
->names('inventarios.titems');
//rutas para los movimientos
Route::resource('inventarios/movimientos/detalles',MovimientoDetalleController::class)
->names('inventarios.movimientos.detalles');
Route::resource('inventarios/movimientos/tmovimientos',TmovimientoController::class)
->names('inventarios.movimientos.tmovimientos');
Route::resource('inventarios/movimientos',MovimientoController::class)
->names('inventarios.movimientos');

//rutas para saber las existencias
Route::resource('inventarios/existencias',ExistenciaController::class)
->names('inventarios.existencias');
//Rutas para administrador
Route::resource('administrador/almacenes/encargados',EncargadoController::class)
->names('administrador.almacenes.encargados');
Route::resource('administrador/almacenes',AlmaceneController::class)
->names('administrador.almacenes');
Route::resource('administrador/usuarios',UsuarioController::class)
->names('administrador.usuarios');
Route::resource('administrador/cargos',CargoController::class)
->names('administrador.cargos');
Route::get('clear-cache',function(){
   echo Artisan::call('cache:clear');
   echo Artisan::call('config:clear');
   echo Artisan::call('config:cache');
   echo Artisan::call('route:cache');
});
