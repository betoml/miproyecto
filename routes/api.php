<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('login', [AuthController::class, 'login']);
Route::post('logouts', [AuthController::class, 'logouts']);
Route::get('usuarios', [AuthController::class, 'index']);




Route::middleware('auth:sanctum')->group(function () {



  Route::post('register', [AuthController::class, 'register']);
  Route::post('logout', [AuthController::class, 'logout']);

  Route::post('usuarios-update', [AuthController::class, 'update']);
  Route::post('usuarios-delete', [AuthController::class, 'destroy']);
  Route::post('usuarios-info', [AuthController::class, 'userInfo']);



  Route::get('planes', [PlanesController::class, 'index']);
  Route::post('planes-create', [PlanesController::class, 'create']);
  Route::post('planes-update', [PlanesController::class, 'update']);
  Route::post('planes-delete', [PlanesController::class, 'destroy']);



  //PELICULAS
  Route::get('peliculas', [PeliculasController::class, 'index']);
  Route::post('peliculas-create', [PeliculasController::class, 'create']);
  Route::post('peliculas-update', [PeliculasController::class, 'update']);
  Route::post('peliculas-delete', [PeliculasController::class, 'delete']);
  Route::post('ultimas-peliculas', [PeliculasController::class, 'getUltimasPeliculas']);
  Route::post('peliculas-detail', [PeliculasController::class, 'getPelicula']);
  Route::post('peliculas-all', [PeliculasController::class, 'getPeliculasAll']);
  Route::post('peliculas-search', [PeliculasController::class, 'search']);

  //SERIES
  Route::get('series', [SeriesController::class, 'index']);
  Route::post('series-create', [SeriesController::class, 'create']);
  Route::post('series-update', [SeriesController::class, 'update']);
  Route::post('series-delete', [SeriesController::class, 'delete']);
  Route::post('ultimas-series', [SeriesController::class, 'getUltimasSeries']);
  Route::post('series-detail', [SeriesController::class, 'getSerie']);
  Route::post('series-detail-temporadas', [SeriesController::class, 'getTemporadasAll']);
  Route::post('series-temporadas', [SeriesController::class, 'getTemporadas']);
  Route::post('series-all', [SeriesController::class, 'getSeriesAll']);
  Route::post('series-search', [SeriesController::class, 'search']);

  //CAPITULOS
  Route::get('capitulos', [CapitulosController::class, 'index']);
  Route::post('capitulos-create', [CapitulosController::class, 'create']);
  Route::post('capitulos-update', [CapitulosController::class, 'update']);
  Route::post('capitulos-delete', [CapitulosController::class, 'delete']);

  //FAVORITOS SERIES



  //FAVORITOS PELICULAS
  Route::post('peliculas-favoritos', [Favoritos_PeliculasController::class, 'index']);
  Route::post('peliculas-favoritos-verificar', [Favoritos_PeliculasController::class, 'verificar']);
  Route::post('peliculas-favoritos-borrar', [Favoritos_PeliculasController::class, 'delete']);
  Route::post('peliculas-favoritos-crear', [Favoritos_PeliculasController::class, 'create']);


  //FAVORITOS SERIES
  Route::post('series-favoritos', [Favoritos_SeriesController::class, 'index']);
  Route::post('series-favoritos-verificar', [Favoritos_SeriesController::class, 'verificar']);
  Route::post('series-favoritos-borrar', [Favoritos_SeriesController::class, 'delete']);
  Route::post('series-favoritos-crear', [Favoritos_SeriesController::class, 'create']);
});
