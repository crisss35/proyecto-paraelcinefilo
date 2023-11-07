@extends("layouts.app")

@section("titulo")
    Registrate
@endsection

@section("contenido")

    <div class="md:flex md:justify-center items-center mt-8">
        <div class="md:w-4/12 bg-gray-100 p-6 rounded-sm shadow mx-auto">
            <form action="{{ route("register") }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label for="name" class="text-gray-600 font-bold mb-2 block">Nombre</label>
                    <input 
                        class="border p-2 w-full rounded-lg shadow focus: border-gray-300 @error("name") border-red-500 @enderror" 
                        type="text" 
                        name="name" 
                        id="name" 
                        placeholder="Ingresa Nombre"
                        value="{{ old("name") }}"
                    />    
                </div>

                
                @error("name")
                    <p class="bg-red-500 text-white rounded-lg text-center text-sm p-1.5 mb-2">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-5">
                    <label for="username" class="text-gray-600 font-bold mb-2 block">Username</label>
                    <input 
                        class="border p-2 w-full rounded-lg shadow focus: border-gray-300 @error("username") border-red-500 @enderror" 
                        type="text" 
                        name="username" 
                        id="username" 
                        placeholder="Ingresa Nombre de Usuario"
                        value="{{ old("username") }}"
                    />    
                </div>

                @error("username")
                    <p class="bg-red-500 text-white rounded-lg text-center text-sm p-1.5 mb-2">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-5">
                    <label for="email" class="text-gray-600 font-bold mb-2 block">Correo</label>
                    <input class="border p-2 w-full rounded-lg shadow focus: border-gray-300 @error("email") border-red-500 @enderror" 
                        type="email" 
                        name="email" 
                        id="email" 
                        placeholder="Ingresa Correo"
                        value="{{ old("email") }}"
                    />    
                </div>

                @error("email")
                    <p class="bg-red-500 text-white rounded-lg text-center text-sm p-1.5 mb-2">
                        {{ $message }}
                    </p>
                @enderror
                
                <div class="mb-5">
                    <label for="password" class="text-gray-600 font-bold mb-2 block">Password</label>
                    <input class="border p-2 w-full rounded-lg shadow focus: border-gray-300 @error("password") border-red-500 @enderror" 
                        type="password" 
                        name="password" 
                        id="password" 
                        placeholder="Crea tu Contraseña"
                    /> 
                </div>

                @error("password")
                    <p class="bg-red-500 text-white rounded-lg text-center text-sm p-1.5 mb-2">
                        {{ $message }}
                    </p>
                @enderror

                <div class="mb-5">
                    <label for="password_confirmation" class="text-gray-600 font-bold mb-2 block">Comprobar Password</label>
                    <input class="border p-2 w-full rounded-lg shadow focus: border-gray-300" 
                        type="password" 
                        name="password_confirmation" 
                        id="password_confirmation"
                        placeholder="Comprobar Contraseña"
                    /> 
                </div>

                <input class="bg-green-500 w-full hover:bg-green-600 cursor-pointer p-3 rounded-md text-white uppercase 
                font-bold mt-4 shadow focus: border-gray-300"
                    type="submit" 
                    value="Crear cuenta"
                />

            </form>

        </div>
@endsection