<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImagenController extends Controller
{
    
    public function store(Request $request) {

        $imagen = $request->file("file"); //* La imagen que se subira, llevan el nombre file

        //* Str::uuid(): Crear nombres unicos para las imagenes e incluir la extension
        $nombreImagen = Str::uuid() . "." . $imagen->extension();

        //* Aplicando intervention image
        $imagenServidor = Image::make($imagen); //* Aqui la imagen esta en memoria
        $imagenServidor->fit(1000, 1000); //* Tamaño de la imagen

        //* Al subir una imagen se quedara en uploads
        $imagenPath = public_path("uploads") . "/" . $nombreImagen;
        $imagenServidor->save($imagenPath); //* Guardara la imagen con la ruta indicada

        return response()->json(['imagen' => $nombreImagen]);

    }


}
