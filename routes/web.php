<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CitaMedicaController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EnfermedadController;
use App\Http\Controllers\RecetaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí se registran las rutas web de la aplicación. Estas rutas son
| cargadas por el RouteServiceProvider dentro de un grupo que contiene
| el middleware "web".
|
*/

// Ruta principal para la página de inicio
Route::get('/', function () {
    return view('home');
})->name('home');

// Rutas de autenticación (login, logout y restablecimiento de contraseñas)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // Formulario de login
Route::post('/login', [LoginController::class, 'login']); // Procesar login
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Procesar logout

// Restablecimiento de contraseñas (usar las vistas predeterminadas de Laravel)
Auth::routes(['register' => false]); // Puedes deshabilitar registro si no es necesario

// Rutas de recursos estándar (CRUD)
Route::resource('patients', PatientController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('citas_medicas', CitaMedicaController::class);
Route::resource('enfermedades', EnfermedadController::class)->parameters(['enfermedades' => 'enfermedad']);

// Rutas para manejar recetas asociadas a una cita médica
Route::prefix('citas_medicas/{citaMedicaId}/recetas')->group(function () {
    Route::get('/', [RecetaController::class, 'index'])->name('recetas.index'); // Listar recetas de una cita médica
    Route::get('/create', [RecetaController::class, 'create'])->name('recetas.create'); // Formulario para crear receta
    Route::post('/', [RecetaController::class, 'store'])->name('recetas.store'); // Guardar receta
    Route::get('/{id}/edit', [RecetaController::class, 'edit'])->name('recetas.edit'); // Editar receta
    Route::put('/{id}', [RecetaController::class, 'update'])->name('recetas.update'); // Actualizar receta
    Route::delete('/{id}', [RecetaController::class, 'destroy'])->name('recetas.destroy'); // Eliminar receta
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
