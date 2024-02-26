<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\PerfilController;
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

Route::get('/', HomeController::class)->name("home");


//* Asociar con el controlador para mostrar la vista
Route::get('/register', [RegisterController::class, "index"])->name("register"); //* La URL tomara este nombre
Route::post('/register', [RegisterController::class, "store"]);

Route::get('/noticias', [NoticiasController::class, "index"])->name("noticias");

Route::get('/posts/{post}', [NoticiasController::class, "show"])->name("noticias.show");

Route::get('/reviews', function () {
    return view('reviews');
});

Route::get('/login', [LoginController::class, "index"])->name("login");
Route::post('/login', [LoginController::class, "store"]);

Route::post('/logout', [LogoutController::class, "store"])->name("logout");

Route::get('/editar-perfil', [PerfilController::class, 'index'])->name("perfil.index");
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name("perfil.store");


//* Mostrar el fomulario para crear publicaciones
Route::get('/posts/create', [PostController::class, 'create'])->name("posts.create");
Route::post('/posts', [PostController::class, 'store'])->name("posts.store");

//* Ruta para ver un post especifico + nombre del usuario asociado a dicho post
Route::get('/{user:username}/posts/{post}', [PostController::class, 'show'])->name("posts.show");
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name("posts.destroy");

//* Ruta para insertar comentarios
Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name("comentarios.store");
Route::post('/imagenes', [ImagenController::class, 'store'])->name("imagenes.store");

//* Like para las publicaciones
Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name("posts.likes.store");
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name("posts.likes.destroy");

//* Para mostrar el nombre de usuario en la URL
Route::get('/{user:username}', [PostController::class, "index"])->name("posts.index");


//* Siguiendo a usuarios
Route::post('/{user:username}/follow', [FollowerController::class, 'store'])->name("users.follow");
Route::delete('/{user:username}/unfollow', [FollowerController::class, 'destroy'])->name("users.unfollow");
