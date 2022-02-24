<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\MensajesController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\GraficoController;
use App\Http\Controllers\PerfilController;



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
    return view('secciones.inicio');
})->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();
Route::resource('inicio', InicioController::class);
Route::resource('mensajes', MensajesController::class);
Route::get('lang/{lang}', [LanguageController::class, 'swap'])->name('lang.swap');
Route::resource('grafico', GraficoController::class);
Route::get('/grafica',function(){return view('secciones.grafica');})->name('grafica');
Route::resource('perfil', PerfilController::class);

Route::get('/home', [App\Http\Controllers\InicioController::class, 'index'])->name('home');
