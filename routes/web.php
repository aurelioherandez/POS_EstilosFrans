<?php

use App\Http\Controllers\categoriaController;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\compraController;
use App\Http\Controllers\devolucioneController;
use App\Http\Controllers\facturaController;
use App\Http\Controllers\laboratorioController;
use App\Http\Controllers\marcaController;
use App\Http\Controllers\movimientosController;
use App\Http\Controllers\presentacioneController;
use App\Http\Controllers\productoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\proveedoreController;
use App\Http\Controllers\roleController;
use App\Http\Controllers\transaccionesController;
use App\Http\Controllers\userController;
use App\Http\Controllers\ventaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    route::get('ventas/pdf', [ventaController::class, 'pdf'])->name('ventas.pdf');
    Route::get('ventas/factura', [ventaController::class, 'factura'])->name('ventas.factura');
    route::get('compras/pdf', [compraController::class, 'pdf'])->name('compras.pdf');
    route::resources([
        'categorias' => categoriaController::class,
        'marcas' => marcaController::class,
        'presentaciones' => presentacioneController::class,
        'proveedores' => proveedoreController::class,
        'tallas' => laboratorioController::class,
        'productos' => productoController::class,
        'compras' => compraController::class,
        'ventas' => ventaController::class,
        'clientes' => clienteController::class,
        'users' => userController::class,
        'roles' => roleController::class,
        'devoluciones' => devolucioneController::class,
        'movimientos' => movimientosController::class,
        'transacciones' => transaccionesController::class,
        'facturas' => facturaController::class
    ]);
});
