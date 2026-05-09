<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AuthController;
use App\Models\Alumno;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/', function () {

    $alumnos = Alumno::paginate(5);

    return view('login', compact('alumnos'));

});

Route::get('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/login', [AuthController::class, 'iniciarSesion'])
    ->name('login.post');

Route::get('/registro', [AuthController::class, 'registro'])
    ->name('registro');

Route::post('/registro', [AuthController::class, 'guardarRegistro'])
    ->name('registro.post');

    
Route::resource('alumnos', AlumnoController::class);