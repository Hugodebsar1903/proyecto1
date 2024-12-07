<?php

use App\Http\Controllers\CursosController;
use App\Http\Controllers\EstudiantesController;
use App\Http\Controllers\ProfesoresController;
use Illuminate\Support\Facades\Route;

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
Route::get('/', function(){
    return redirect('/estudiantes');
});

Route::get('/estudiantes', [EstudiantesController::class, 'viewEstudiantes']);
Route::get('/estudiantes/crear', [EstudiantesController::class, 'create']);
Route::post('/estudiantes/crear', [EstudiantesController::class, 'store']);
Route::get('/estudiante/agregar-curso/{id}', [EstudiantesController::class, 'agregarCurso']);
Route::post('/estudiante/guardar-curso', [EstudiantesController::class, 'guardarCurso']);
Route::post('/estudiante/eliminar-curso', [EstudiantesController::class, 'eliminarCurso']);
Route::delete('estudiantes/{id}', [EstudiantesController::class, 'destroy']);

// Cursos
Route::get('/cursos', [CursosController::class, 'list']);
Route::get('/cursos/crear', [CursosController::class, 'create']);

// Cursos
Route::get('/profesores', [ProfesoresController::class, 'list']);
Route::get('/profesores/crear', [ProfesoresController::class, 'create']);
