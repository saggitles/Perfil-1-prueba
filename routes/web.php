<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\DepartamentosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/empleados/search', [EmpleadosController::class, 'search'])->name('empleados.search');
    

    Route::resources([
        'empleados' => EmpleadosController::class,
        'departamentos' => DepartamentosController::class,
    ]);
});

require __DIR__.'/auth.php';


