<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware("auth");
    }
    
    public function index() {
        
        return view("perfil.index");

    }

    public function store(Request $request) {
        // $usuario = User::find(auth()->user()->id);
        // dd($usuario->email);
        //dd($request->oldPassword);

        //* Modificar el request para el username
        $request->request->add(['username' => Str::slug($request->username)]);

        //? "unique:users,username," .auth()->user()->id : cuando quieres mantener el mismo nombre
        $this->validate($request, [
            'username' => ["required", "unique:users,username," .auth()->user()->id, "min:3", "max:30", "not_in:twitter,editar-perfil"],
            'email' => ["required", "unique:users,email," .auth()->user()->id, "email", "max:60"],
            // 'oldPassword' => ["required", "min:6"],
            // 'password' => ["required", "min:6"]
        ]);

        if($request->imagen) {
            $imagen = $request->file("imagen");

            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            //* Aplicando intervention image
            $imagenServidor = Image::make($imagen);
            $imagenServidor->fit(1000, 1000);

            $imagenPath = public_path("perfiles") . "/" . $nombreImagen;
            $imagenServidor->save($imagenPath);
        }

        //? Guardar
        $usuario = User::find(auth()->user()->id);

        $usuario->username = $request->username;
        $usuario->email = $request->email;

        //* Revisar si ya hay una imagen subida
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;


        if(empty($request->oldPassword) && empty($request->password)) {
            $usuario->save();
            return redirect()->route("posts.index", $usuario->username);
        }

        if($request->oldPassword || $request->password){

            $this->validate($request, [
                'oldPassword' => 'required|min:6',
                'password' => 'required|min:6'
            ]);

            if(Hash::check($request->oldPassword, $usuario->password)){
                $usuario->password = Hash::make($request->password);
                $usuario->save();
                return redirect()->route("posts.index", $usuario->username);
            } else {
                return back()->with('mensaje', 'El password antiguo no coincide.');
            }
            
        }
    
    }

}
