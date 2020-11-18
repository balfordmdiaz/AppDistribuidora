<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MessageClient;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\Messagefactura;
use App\Http\Controllers\FactDetalleController;

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

Route::view('/','home')->name('home');
//Route::view('/cliente','cliente')->name('cliente');

Route::post('/cliente',[MessageClient::class, 'store'])->name('cliente.store');//Messageclient se encargara de la gestion de clientes

Route::post('/cliente/{Idcliente}/edit',[MessageClient::class, 'update'])->name('cliente.update');

Route::get('/cliente/insertar',[ClienteController::class, 'insertar'])->name('cliente.insertar');

Route::get('/cliente',[ClienteController::class, 'index'])->name('cliente.index');

Route::get('/cliente/{Idcliente}',[ClienteController::class, 'show'])->name('cliente.show');

Route::get('/cliente/{Idcliente}/edit',[ClienteController::class, 'edit'])->name('cliente.edit');

//Route::view('/factura','factura')->name('factura');

Route::get('/factura',[FacturaController::class, 'index'])->name('factura.index');

Route::get('/factura/insertar',[FacturaController::class, 'insertar'])->name('factura.insertar');

Route::post('/factura/insertar',[Messagefactura::class, 'store'])->name('factura.store');

Route::get('/factura/insertar/{id}/index',[FactDetalleController::class, 'index'])->name('factura.vistafactura');

Route::get('/factura/insertar/{id}/variante',[FactDetalleController::class, 'gettalla']);

Route::get('/factura/insertar/{id}/colores',[FactDetalleController::class, 'getcolor']);

Route::get('/factura/insertar/{id}/precio',[FactDetalleController::class, 'getprecio']);

Route::post('/factura/insertar/{id}/index',[FactDetalleController::class, 'store'])->name('factura.agregar');

Route::get('/factura/insertar/{id}/index/facturar',[FactDetalleController::class, 'facturador'])->name('factura.facturar');

Route::get('/factura/insertar/{id}/index/facturar/descargar',[FactDetalleController::class, 'descargar'])->name('factura.descargar');




