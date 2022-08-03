<?php

use App\Http\Controllers\{EpisodiosController,SeriesController, TemporadasController};
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/series',[SeriesController::class,'index'])->name('listar-series');
Route::get('/series/criar',[SeriesController::class,'create'])->name('form-criar-serie');
Route::post('/series/criar',[SeriesController::class,'store']);
Route::delete('/series/{id}',[SeriesController::class,'destroy']);
Route::post('/series/{id}/editNome', [SeriesController::class,'edit'] );
Route::get('/series/{serie_id}/temporadas', [TemporadasController::class,'index']);
Route::get('/temporadas/{temporada}/episodios', [EpisodiosController::class,'index']);
