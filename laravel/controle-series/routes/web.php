<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;


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
Route::put('/series/criar'. [SeriesController::class,'update']);