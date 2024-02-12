<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    
    public function index(Post $post) {
        return view("noticias");

    }


    public function show(Post $post) {

        return view("noticias.show", [
            "post" => $post
        ]);

    }

}
