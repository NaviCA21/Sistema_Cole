<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\ReporteEstudianteController;
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\ColocacionNotasController;
use App\Http\Controllers\VerAsignacionesController;


Route::resource('estudiante', EstudianteController::class);
Route::resource('docente', DocenteController::class);
Route::resource('grado', GradoController::class);
Route::resource('matricula', MatriculaController::class);
Route::resource('reportenotas', ReporteEstudianteController::class);
Route::resource('asignacion', AsignacionController::class);
Route::resource('curso', CursoController::class);
Route::resource('colocacionnotas', ColocacionNotasController::class);
Route::resource('verasignaciones', VerAsignacionesController::class);



Route::get('/',  [PostController::class, 'index'])->name('posts.index');

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get( 'tag/{tag}', [PostController::class, 'tag'] )->name('posts.tag');

Route::get( 'category/{category}', [PostController::class, 'category'] )->name('posts.category');


Route::get( 'mecanica', [PostController::class, 'inicio'] )->name('mecanica.inicio');
Route::get( 'electronica', [PostController::class, 'electronica'] )->name('electronica.inicio');
Route::get( 'sistemas', [PostController::class, 'sistemas'] )->name('sistemas.inicio');
Route::get( 'general', [PostController::class, 'general'] )->name('general.inicio');
Route::get( 'responsable', [PostController::class, 'responsable'] )->name('responsable.inicio');


// Route::get( 'category/ingenieria-mecanica', [PostController::class, 'sistemas'] )->name('sistemas.inicio');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

