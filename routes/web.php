<?php

use App\Http\Controllers\cargosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\empleadosController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return redirect('empleados');
});


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest'); //guest no deja regresar a la vista login cuando el usurio esta autenticado 
Route::post('/login', [LoginController::class, 'validate'])->name('login.validate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


//empleados
Route::get('/empleados', [empleadosController::class, 'index'])->name('empleados')->middleware('auth'); //el middleware "auth" valida si hay una session activa y si no se redirige a la ruta con nombre login

Route::get('/empleados/create', [empleadosController::class, 'create'])->name('empleados.create')->middleware('auth');
Route::post('/empleados', [empleadosController::class, 'store'])->name('empleados.store')->middleware('auth');

Route::get('/empleados/{edit}/edit', [empleadosController::class, 'edit'])->name('empleados.edit')->middleware('auth');
Route::put('/empleados/{id}', [empleadosController::class, 'update'])->name('empleados.update')->middleware('auth');

Route::delete('/empleados/{id}', [empleadosController::class, 'destroy'])->name('empleados.destroy')->middleware('auth');

Route::put('/empleados/activar/{id}', [empleadosController::class, 'active'])->name('empleados.active')->middleware('auth');


//////////////////////cargos
Route::get('/cargos', [cargosController::class, 'index'])->name('cargos')->middleware('auth');

Route::get('/cargos/create', [cargosController::class, 'create'])->name('cargos.create')->middleware('auth');
Route::post('/cargos', [cargosController::class, 'store'])->name('cargos.store')->middleware('auth');

Route::get('/cargos/{edit}/edit', [cargosController::class, 'edit'])->name('cargos.edit')->middleware('auth');
Route::put('/cargos/{id}', [cargosController::class, 'update'])->name('cargos.update')->middleware('auth');

Route::delete('/cargos/{id}', [cargosController::class, 'destroy'])->name('cargos.destroy')->middleware('auth');
Route::put('/cargos/activar/{id}', [cargosController::class, 'active'])->name('cargos.active')->middleware('auth');


//panel
Route::get('/panel', function () {
    return view('panel.home');
})->name('panel')->middleware('auth');