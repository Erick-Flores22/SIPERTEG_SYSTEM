<?php
// al comienzo, carga las rutas por defecto:
require __DIR__.'/auth.php';

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AbonadoController;
use App\Http\Controllers\NodoController;
use App\Http\Controllers\CajaDistribucionController;
use App\Http\Controllers\CobroController;
use App\Http\Controllers\FallaController;
use App\Http\Controllers\DatosTecnicoController;
use App\Http\Controllers\InstalacionController;
use App\Http\Controllers\DefectoController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CaptchaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Página de bienvenida
Route::get('/', fn() => view('welcome'));

// ───────────────────────────────────────────────────────────────────────────
// 1. RUTAS PARA CAPTCHA (sólo invitados)
// ───────────────────────────────────────────────────────────────────────────
Route::middleware('guest')->group(function () {
    // Formulario de captcha tras validar credenciales
    Route::get('/captcha', [CaptchaController::class, 'showCaptchaForm'])
         ->name('captcha.form');

    // Imagen dinámica del captcha
    Route::get('/captcha-image', [CaptchaController::class, 'captchaImage'])
         ->name('captcha.image');

    // Validación del captcha
    Route::post('/captcha', [CaptchaController::class, 'validateCaptcha'])
         ->name('captcha.validate');
});

// ───────────────────────────────────────────────────────────────────────────
// 2. RUTAS DE AUTENTICACIÓN CON CAPTCHA
// ───────────────────────────────────────────────────────────────────────────
// Sobrescribimos las rutas de login para usar tu LoginController
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ───────────────────────────────────────────────────────────────────────────
// 3. DASHBOARD & PROFILE (requiere usuario autenticado y email verificado)
// ───────────────────────────────────────────────────────────────────────────
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');

    Route::get('/profile',   [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile',[ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ───────────────────────────────────────────────────────────────────────────
// 4. RUTAS PROTEGIDAS DE LA APLICACIÓN (CRUD, estadísticas...)
// ───────────────────────────────────────────────────────────────────────────
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('abonados', AbonadoController::class);
    Route::get('abonados/{abonado}/historial',     [AbonadoController::class, 'historial'])
         ->name('abonados.historial');
    Route::get('abonados/{abonado}/historial/pdf', [AbonadoController::class, 'historialPdf'])
         ->name('abonados.historial.pdf');

    Route::resource('nodos', NodoController::class);
    Route::resource('cajas_distribucion', CajaDistribucionController::class)
         ->parameters(['cajas_distribucion' => 'caja_distribucion']);
    Route::resource('cobros', CobroController::class);
    Route::resource('fallas', FallaController::class);
    Route::resource('datos_tecnicos', DatosTecnicoController::class);

    Route::get('instalaciones', [InstalacionController::class, 'index'])
         ->name('instalaciones.index');
    Route::patch('instalaciones/{instalacion}/toggle',
                 [InstalacionController::class, 'toggle'])
         ->name('instalaciones.toggle');

    Route::get('defectos',            [DefectoController::class, 'index'])->name('defectos.index');
    Route::get('defectos/create',     [DefectoController::class, 'create'])->name('defectos.create');
    Route::post('defectos',           [DefectoController::class, 'store'])->name('defectos.store');
    Route::get('defectos/{defecto}/edit',  [DefectoController::class, 'edit'])->name('defectos.edit');
    Route::patch('defectos/{defecto}',      [DefectoController::class, 'update'])->name('defectos.update');
    Route::patch('defectos/{defecto}/toggle',[DefectoController::class, 'toggle'])->name('defectos.toggle');

    Route::get('estadisticas', [StatisticsController::class, 'index'])
         ->name('estadisticas.index');
});


