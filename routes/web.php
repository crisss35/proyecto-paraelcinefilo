<?php

use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('principal');
});

//* Asociar con el controlador para mostrar la vista
Route::get('/register', [RegisterController::class, "index"])->name("register"); //* La URL tomara este nombre
Route::post('/register', [RegisterController::class, "store"]);

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/noticias', function () {
    return view('noticias');
});

Route::get('/reviews', function () {
    return view('reviews');
});