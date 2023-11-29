<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    
    public function index() {

        return view("auth.login");

    }

    public function store(Request $request) {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);


        //* Verificar si las credenciales entregadas existen o no
        if(!auth()->attempt($request->only("email", "password"), $request->remember)) {
            //* Back retorna hacia la pagina anterior y con with creamos un mensaje
            //* En pocas palabras, vuelve a la pagina anterior con este mensaje
            return back()->with("mensaje", "Credenciales Incorrectas");
        }

        return redirect()->route("posts.index", auth()->user()->username);

    }


}
