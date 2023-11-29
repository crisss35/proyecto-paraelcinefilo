<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    //* Antes de mostrar el dashboard se verificara si el usuario esta autenticado o no
    public function __construct()
    {
        $this->middleware("auth");
    }


    public function index(User $user) {

        return view("dashboard", [
            "user" => $user
        ]);

    }

    public function create() {

        return view("posts.create");

    }

}
