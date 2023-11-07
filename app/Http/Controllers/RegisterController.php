<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('auth.register');
    }

    public function store(Request $request) {
        //? Acceder a los valores que envias por post: dd($request->get("name"));

        //* Validacion de fomulario
        $this->validate($request, [
            'name' => 'required|max:30',
            'username' => 'required|unique:users|min:3|max:30',
            'email' => 'required|unique:users|email|max:60',
            
            //* Con la regla confirmed el campo de password verificara si coincide con el campo de confirmacion (password_confirmation)
            'password' => 'required|confirmed|min:6' 
        ]);

        dd("Creando");
    }
}
