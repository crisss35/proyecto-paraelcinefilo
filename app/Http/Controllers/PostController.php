<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{

    //* Antes de mostrar el dashboard se verificara si el usuario esta autenticado o no
    public function __construct()
    {
        //* Solo podran manipular los usuarios que esten autenticados
        //* Los que no esten logueados podran ver las publicaciones
        $this->middleware("auth")->except(['show', 'index']);
    }


    public function index(User $user) {

        //* Filtrar las publicaciones de un usuario (desde la base de datos) segun su id, con get obtengo los resultados
        //* Con paginate puedo listar mediante paginas segun la cantidad de post que quiero mostrar
        $post = Post::where("user_id", $user->id)->latest()->paginate(4);

        return view("dashboard", [
            "user" => $user,
            "posts" => $post //* Incluir el filtro de post en el dashboard para que se muestre en pantalla
        ]);

    }

    public function create() {
        return view("posts.create");
    }


    public function store(Request $request) {

        $this->validate($request, [
            "titulo" => 'required|max:255',
            "descripcion" => 'required',
            "imagen" => 'required'
        ]);

        // Post::create([

        //     "titulo" => $request->titulo,
        //     "descripcion" => $request->descripcion,
        //     "imagen" => $request->imagen,
        //     "user_id" => auth()->user()->id

        // ]);

        //* Otra forma de crear registros
        // $post = new Post;

        // $post->titulo = $request->titulo;
        // $post->descripcion = $request->descripcion;
        // $post->imagen = $request->imagen;
        // $post->user_id = auth()->user()->id;
        // $post->save();

        //* Guardando registros con la relacion aplicada (One to Many: un usuario puede tener varios posts)
        $request->user()->posts()->create([
            "titulo" => $request->titulo,
            "descripcion" => $request->descripcion,
            "imagen" => $request->imagen,
            "user_id" => auth()->user()->id
        ]);


        return redirect()->route("posts.index", auth()->user()->username);

    }


    public function show(User $user, Post $post) {

        //* Al mostrar la vista tengo disponible el metodo post para mostrar la informacion
        return view("posts.show", [
            "post" => $post,
            "user" => $user
        ]);

    }


    public function destroy(Post $post) {

        //* Invocar el policy para validar si el post pertenece al usuario logueado
        $this->authorize("delete", $post);
        $post->delete();


        //! Eliminar la imagen
        $imagen_path = public_path("uploads/" . $post->imagen); //? Obtener la ruta

        if(File::exists($imagen_path)) {
            unlink($imagen_path);
        }

        //* Redireccionar al muro, incluir el nombre de usuario (lo pide en la url)
        return redirect()->route("posts.index", auth()->user()->username);

    }

}
