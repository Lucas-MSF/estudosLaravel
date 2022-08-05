<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{EntrarController, EpisodiosController, RegistroController, SeriesController, TemporadasController};
use App\Mail\NovaSerie;
use Illuminate\Support\Facades\Mail;

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
Route::get('/series/criar',[SeriesController::class,'create'])->name('form-criar-serie')->middleware('auth');
Route::post('/series/criar',[SeriesController::class,'store'])->middleware('auth');
Route::delete('/series/{id}',[SeriesController::class,'destroy'])->middleware('auth');
Route::post('/series/{id}/editNome', [SeriesController::class,'edit'] )->middleware('auth');
Route::get('/series/{serie_id}/temporadas', [TemporadasController::class,'index']);
Route::get('/temporadas/{temporada}/episodios', [EpisodiosController::class,'index']);
Route::post('/temporadas/{temporada}/episodios/assistir', [EpisodiosController::class,'assistir'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/entrar',[EntrarController::class,'index']);
Route::post('/entrar',[EntrarController::class,'entrar'])->name('entrar');
Route::get('/registrar',[RegistroController::class, 'create']);
Route::post('/registrar',[RegistroController::class, 'store']);

Route::get('/sair', function()
{
    Auth::logout();
    return redirect('/entrar');
});


