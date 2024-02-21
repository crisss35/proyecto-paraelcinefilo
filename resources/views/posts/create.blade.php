@extends("layouts.app")


@section("titulo")
    Crear publicacion
@endsection

@push("styles") {{-- Cargar la hoja de estilos de dropzone --}}
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />    
@endpush


@section("contenido")
    
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action="{{ route("imagenes.store") }}" method="POST" enctype="multipart/form-data" id="dropzone" 
                class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>

        <div class="md:w-1/2 p-10 bg-gray-100 rounded-sm shadow mt-10 md:mt-0">
            <form action="{{ route("posts.store") }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="text-gray-600 font-bold mb-2 block">Titulo</label>
                    <input 
                        class="border p-2 w-full rounded-lg shadow focus:border-gray-300 @error("titulo") border-red-500 @enderror" 
                        type="text" 
                        name="titulo" 
                        id="titulo" 
                        placeholder="Titulo de la Publicacion"
                        value="{{ old("titulo") }}"
                    />    
                </div>

                
                @error("titulo")
                    <p class="bg-red-500 text-white rounded-lg text-center text-sm p-1.5 mb-2">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-5">
                    <label for="descripcion" class="text-gray-600 font-bold mb-2 block">Descripcion</label>
                    <textarea
                        class="border p-2 w-full rounded-lg shadow focus: border-gray-300 @error("descripcion") border-red-500 @enderror" 
                        id="descripcion"
                        name="descripcion" 
                        placeholder="Descripcion de la Publicacion"
                    >{{ old("descripcion") }}</textarea>    
                </div>

                
                @error("descripcion")
                    <p class="bg-red-500 text-white rounded-lg text-center text-sm p-1.5 mb-2">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-5">
                    <input type="hidden" name="imagen" value="{{ old("imagen") }}">
                </div>

                @error("imagen")
                    <p class="bg-red-500 text-white rounded-lg text-center text-sm p-1.5 mb-2">
                        {{ $message }}
                    </p>
                @enderror

                <input class="bg-green-500 w-full hover:bg-green-600 cursor-pointer p-3 rounded-md text-white uppercase 
                font-bold mt-4 shadow focus: border-gray-300"
                    type="submit" 
                    value="Crear Publicacion"
                />
            </form>
        </div>
    </div>

@endsection