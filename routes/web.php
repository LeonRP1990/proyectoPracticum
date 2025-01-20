<?php

use App\Http\Controllers\CitaMedicaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EnfermedadController;

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

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('patients', PatientController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('citas_medicas', CitaMedicaController::class);
Route::resource('enfermedades', EnfermedadController::class)->parameters(['enfermedades' => 'enfermedad']);

//Route::get('/patients', [PatientController::class, 'index'])->name('patients.index');
