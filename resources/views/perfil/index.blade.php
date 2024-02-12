@extends("layouts.app")


@section("titulo")
    Editar Perfil: {{ auth()->user()->username }}
@endsection


@section("contenido")
    
    <div class="md:flex justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">

            <form class="mt-10 md:mt-0" method="POST" action="{{ route("perfil.store") }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="username" class="text-gray-600 font-bold mb-2 block">
                        Nombre de Usuario
                    </label>
                    <input 
                        class="border p-2 w-full rounded-lg shadow focus: border-gray-300 @error("username") border-red-500 @enderror" 
                        type="text" 
                        name="username" 
                        id="username" 
                        placeholder="Ingresa Nombre de Usuario"
                        value="{{ auth()->user()->username }}"
                    />    
                </div>

                
                @error("username")
                    <p class="bg-red-500 text-white rounded-lg text-center text-sm p-1.5 mb-2">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-5">
                    <label for="email" class="text-gray-600 font-bold mb-2 block">
                        Correo
                    </label>
                    <input 
                        class="border p-2 w-full rounded-lg shadow focus: border-gray-300 @error("email") border-red-500 @enderror" 
                        type="email" 
                        name="email" 
                        id="email" 
                        placeholder="Ingresa Correo"
                        value="{{ auth()->user()->email }}"
                    />    
                </div>
                
                @error("email")
                    <p class="bg-red-500 text-white rounded-lg text-center text-sm p-1.5 mb-2">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-5">
                    <label for="oldPassword" class="text-gray-600 font-bold mb-2 block">
                        Contraseña Actual
                    </label>
                    <input 
                        class="border p-2 w-full rounded-lg shadow focus: border-gray-300 @error("oldPassword") border-red-500 @enderror" 
                        type="password" 
                        name="oldPassword" 
                        id="oldPassword" 
                        placeholder="Contraseña Actual"
                    />    
                </div>
                
                @error("oldPassword")
                    <p class="bg-red-500 text-white rounded-lg text-center text-sm p-1.5 mb-2">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-5">
                    <label for="password" class="text-gray-600 font-bold mb-2 block">
                        Nueva Contraseña
                    </label>
                    <input 
                        class="border p-2 w-full rounded-lg shadow focus: border-gray-300 @error("password") border-red-500 @enderror" 
                        type="password" 
                        name="password" 
                        id="password" 
                        placeholder="Nueva Contraseña"
                    />    
                </div>
                
                @error("password")
                    <p class="bg-red-500 text-white rounded-lg text-center text-sm p-1.5 mb-2">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-5">
                    <label for="imagen" class="text-gray-600 font-bold mb-2 block">
                        Imagen de Perfil
                    </label>
                    <input 
                        class="border p-2 w-full rounded-lg shadow focus: border-gray-300" 
                        type="file" 
                        name="imagen" 
                        id="imagen"
                        accept=".jpg, .jpeg, .png"
                    />    
                </div>

                <div class="flex justify-center gap-3">
                    <input class="bg-green-500 w-full hover:bg-green-600 cursor-pointer p-3 rounded-md text-white uppercase 
                    font-bold mt-4 shadow focus: border-gray-300"
                        type="submit" 
                        value="Guardar Cambios"
                    />

                    <input class="bg-yellow-400 w-full hover:bg-yellow-500 cursor-pointer p-3 rounded-md text-white uppercase 
                    font-bold mt-4 shadow focus: border-gray-300"
                        type="submit"
                        value="Volver"
                        onclick="history.back()"
                    />    
                </div>

                
            </form>

        </div>
    </div>

@endsection