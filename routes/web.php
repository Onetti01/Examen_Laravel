<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('principal');


Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/closeSesion', [HomeController::class, 'closeSesion']);
Route::get('/mostrarNativos/{idioma_aprender}', [HomeController::class, 'mostrarNativos'])->name('mostrarNativos');
Route::get('/ayudar/{idioma_nativo}', [HomeController::class, 'ayudar'])->name('ayudar');
Route::get('/darseBaja/{email}', [HomeController::class, 'darseBaja'])->name('darseBaja');
