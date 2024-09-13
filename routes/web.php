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
})->name('index');

Route::get('index', function () {
    return view('index');
})->name('index');

Route::get('home', function() {
    return view('dashboard');
});

Route::get('logout', function () {
    Auth::logout();
    return redirect('index');
})->name('index');

Route::post('check',[UsuarioController::class,'check']);

Route::middleware(['auth'])->group(function() {
    Route::get('home', function() {
        return view('dashboard');
    });

    Route::resource('usuarios', UsuarioController::class);
});

Route::middleware(['auth','administrador'])->group(function(){
    Route::resource('categorias', CategoriaController::class);
    Route::resource('servicios', ServiciosController::class);
});


