<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ServiciosController;
use App\Http\Controllers\UsuarioController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('index', function () {
    return view('index');
});

Route::get('home', function() {
    return view('dashboard');
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('index');
});


Route::resource('categorias', CategoriaController::class);
Route::resource('servicios', ServiciosController::class);
Route::resource('usuarios', UsuarioController::class);
