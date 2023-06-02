<?php

use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\BusquedaController;
use App\Http\Controllers\SeriesDetailController;
use Illuminate\Support\Facades\Http;
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

Route::get('/', function () {
    return view('welcome');
})->name('login');

Route::get('/home', function () {
    return view('dashboard.dashboard');
})->name('home');

Route::get('/p/{code}', function ($code) {
    $token = session('token');
    $peliculas = Http::withToken($token)->post('https://euforia-films.up.railway.app/api/peliculas-detail', [
        'id_thmdb' => $code
    ]);

    return view('pelicula-detail.index', compact('peliculas'));
})->name('pelicula.show');

Route::get('/player', function () {
    return view('videoplayer.videoplayer');
})->name('videoplayer');

Route::get('/peliculas', function () {
    $token = session('token');
    $peliculas = Http::withToken($token)->get('https://euforia-films.up.railway.app/api/peliculas');


    return view('peliculas.index', compact('peliculas'));
})->name('peliculas');


Route::get('/series', function () {
    $token = session('token');
    $peliculas = Http::withToken($token)->get('https://euforia-films.up.railway.app/api/series');


    return view('series.index', compact('peliculas'));
})->name('series');


Route::get('/s/{code}',[SeriesDetailController::class, 'index'])->name('series.show');

Route::get('/store-video-url', function ($request) {
    $url = $request->input('url');

    session()->put('video_url', $url);
    return view('videoplayer.videoplayer');
})->name('videoplayer');



Route::get('/buscar', [BusquedaController::class, 'buscar'])->name('buscar');
Route::get('/admin/users', [AdminUsersController::class, 'index']);