<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\PostController;
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

Route::get('/noticias', [NoticiasController::class, "index"])->name("noticias");

Route::get('/login', [LoginController::class, "index"])->name("login");
Route::post('/login', [LoginController::class, "store"]);

//* Cerrar la sesion
Route::post('/logout', [LogoutController::class, "store"])->name("logout");

//* Para mostrar el nombre del usuario en la URL
Route::get('/{user:username}', [PostController::class, "index"])->name("posts.index");

Route::get('/posts/create', [PostController::class, 'create'])->name("posts.create");



Route::get('/reviews', function () {
    return view('reviews');
});