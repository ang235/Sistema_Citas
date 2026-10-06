<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecetaController;
use App\Http\Middleware\AdminMiddleware;

// Rutas Públicas (Cliente)
Route::get('/', [CitaController::class, 'inicio'])->name('inicio');
Route::get('/solicitar-cita', [CitaController::class, 'formularioSolicitar'])->name('cita.solicitar');
Route::post('/solicitar-cita', [CitaController::class, 'guardarSolicitud'])->name('cita.guardar');

// Autenticación Sencilla
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas Protegidas del Nutriólogo (Super usuario)
Route::middleware([AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/panel', [CitaController::class, 'panel'])->name('admin.panel');
    Route::get('/cita/{id}/estado', [CitaController::class, 'cambiarEstado'])->name('admin.cita.estado');
    Route::post('/citas/masivo', [CitaController::class, 'cargaMasivaAccion'])->name('admin.citas.masivo');
    
    Route::post('/receta/guardar/{citaId}', [RecetaController::class, 'guardarYGenerar'])->name('admin.receta.guardar');
    Route::get('/receta/imprimir/{citaId}', [RecetaController::class, 'vistaImpresion'])->name('admin.imprimir');
});