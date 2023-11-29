<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {
        //? Acceder a los valores que envias por post: dd($request->get("name"));

        //* Modificar el request para el username
        $request->request->add(['username' => Str::slug($request->username)]);

        //* Validacion de fomulario
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|max:60',
            
            //* Con la regla confirmed el campo de password verificara si coincide con el campo de confirmacion (password_confirmation)
            'password' => 'required|confirmed|min:6' 
        ]);

        
        //? dd($request->get("username")); Obtemer uno de los datos enviados
        //? dd($request->name);


        //* Creando un usuario
        User::create([
            "name" => $request->name,
            "username" => $request->username,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);


        //* Autenticar un usuario mediante las credenciales que se entregen
        // auth()->attempt([
        //     "email" => $request->email,
        //     "password" => $request->password
        // ]);

        //* Otra manera de autenticar
        auth()->attempt($request->only("email", "password"));


        //* Redireccionar
        return redirect()->route("posts.index");




    }
}
