<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AbonadoController;
use App\Http\Controllers\NodoController;
use App\Http\Controllers\CajaDistribucionController;
use App\Http\Controllers\CobroController;
use App\Http\Controllers\FallaController;
use App\Http\Controllers\DatosTecnicoController;
use App\Http\Controllers\InstalacionController;
use App\Http\Controllers\DefectoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatisticsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Dashboard & profile (requires email verification)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// All other routes require authentication
Route::middleware(['auth','verified'])->group(function () {
    // CRUD de abonados
    Route::resource('abonados', AbonadoController::class);
    
    // Historial
    Route::get('abonados/{abonado}/historial',       [AbonadoController::class, 'historial'])
         ->name('abonados.historial');
    Route::get('abonados/{abonado}/historial/pdf',   [AbonadoController::class, 'historialPdf'])
         ->name('abonados.historial.pdf');
    
    // ... resto de tus recursos protegidos

    // Nodos CRUD
    Route::resource('nodos', NodoController::class);

    // Cajas de Distribución CRUD (singular parameter)
    Route::resource('cajas_distribucion', CajaDistribucionController::class)
         ->parameters(['cajas_distribucion' => 'caja_distribucion']);

    // Cobros CRUD
    Route::resource('cobros', CobroController::class);

    // Fallas CRUD
    Route::resource('fallas', FallaController::class);

    // Datos Técnicos CRUD
    Route::resource('datos_tecnicos', DatosTecnicoController::class);

    // Instalaciones index only
    Route::get('instalaciones', [InstalacionController::class, 'index'])
         ->name('instalaciones.index');
         Route::middleware('auth')->group(function () {
    Route::get('instalaciones', [InstalacionController::class,'index'])
         ->name('instalaciones.index');
    Route::patch('instalaciones/{instalacion}/toggle',
                 [InstalacionController::class,'toggle'])
         ->name('instalaciones.toggle');
});

    // Defectos index only
    Route::get('defectos', [DefectoController::class, 'index'])
         ->name('defectos.index');
         Route::middleware('auth')->group(function () {
    Route::get('defectos', [DefectoController::class, 'index'])->name('defectos.index');
    Route::get('defectos/create', [DefectoController::class, 'create'])->name('defectos.create');
    Route::post('defectos', [DefectoController::class, 'store'])->name('defectos.store');
    Route::get('defectos/{defecto}/edit', [DefectoController::class, 'edit'])->name('defectos.edit');
    Route::patch('defectos/{defecto}', [DefectoController::class, 'update'])->name('defectos.update');
    // Toggle estado
    Route::patch('defectos/{defecto}/toggle', [DefectoController::class, 'toggle'])->name('defectos.toggle');
});
Route::middleware('auth')->group(function () {
    // Estadísticas
    Route::get('estadisticas', [StatisticsController::class, 'index'])
         ->name('estadisticas.index');
});
});

require __DIR__.'/auth.php';
