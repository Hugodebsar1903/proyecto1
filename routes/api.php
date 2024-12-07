<?php

use App\Http\Controllers\CursosController;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\ProfesoresController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('ping', function(){
    return "Pong!";
});

Route::resource('estudiantes', EstudiantesController::class);
Route::resource('cursos', CursosController::class);
Route::resource('profesores', ProfesoresController::class);
