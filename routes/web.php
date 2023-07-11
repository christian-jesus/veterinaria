<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {

    //rutas para especialidades

    Route::get('/Specialties', [App\Http\Controllers\admin\SpecialtyController::class, 'index']);

    Route::get('/Specialties/create', [App\Http\Controllers\admin\SpecialtyController::class, 'create']);

    Route::get('/Specialties/{specialty}/edit', [App\Http\Controllers\admin\SpecialtyController::class, 'edit']);

    Route::post('/Specialties', [App\Http\Controllers\admin\SpecialtyController::class, 'sendData']);

    Route::put('/Specialties/{specialty}', [App\Http\Controllers\admin\SpecialtyController::class, 'update']);

    Route::delete('/Specialties/{specialty}', [App\Http\Controllers\admin\SpecialtyController::class, 'destroy']);

    //rutas para medicos

    Route::resource('medicos', 'App\Http\Controllers\admin\DoctorController');

    //rutas para Pacientes

    Route::resource('pacientes', 'App\Http\Controllers\admin\PatientController');


});

Route::middleware(['auth', 'doctor'])->group(function () {

    Route::get('/horario', [App\Http\Controllers\doctor\HorarioController::class, 'edit']);

    Route::post('/horario', [App\Http\Controllers\doctor\HorarioController::class, 'store']);

});

Route::middleware('auth')->group(function() {
    
    Route::get('/reservarcitas/create', [App\Http\Controllers\AppointmentController::class, 'create']);

    Route::post('/miscitas', [App\Http\Controllers\AppointmentController::class, 'store']);
    
    
    Route::post('/Specialties/{specialty}/medicos', [App\Http\Controllers\Api\SpecialtyController::class, 'store']);

});