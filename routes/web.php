<?php

<<<<<<< HEAD
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\DashboardController;
=======
>>>>>>> 6de8615b9b9aac4f5bcf61efc0360250e0bd8c65
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // ========== RUTAS DE PRODUCTOS ==========
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('productos', ProductoController::class);
        Route::get('/stock-critico', [App\Http\Controllers\ProductoController::class, 'criticos'])->name('stock.critico');
        
    });
    
    // ========== RUTAS DE MOVIMIENTOS ==========
    Route::middleware(['role:admin,almacenista'])->group(function () {
        Route::resource('movimientos', MovimientoController::class);
    });
    
});
Route::get('/salir', function() {
    auth()->logout();
    return redirect('/login');
});
require __DIR__.'/auth.php';
=======
>>>>>>> 6de8615b9b9aac4f5bcf61efc0360250e0bd8c65
