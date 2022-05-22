<?php

use Illuminate\Support\Facades\Route;
use App\Models\admin;


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
Route::get('/admin', function () {
    return view('admin');
});
Route::get('/perfilcliente', function () {
    return view('perfilcliente');
});
Route::get('/productos', function () {
    return view('welcome');
});
Route::get('/carritocompras', function () {
    return view('carritocompras');
});
Route::get('/detallecompras', function () {
    return view('detallecompras');
});
Route::get('/admins', function () {
    return admin::ALL();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
