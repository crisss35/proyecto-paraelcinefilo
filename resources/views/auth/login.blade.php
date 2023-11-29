@extends("layouts.app")

@section("titulo")
    Inicia sesion
@endsection

@section("contenido")

    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        
        {{-- <div class="md:flex md:justify-center items-center mt-8"> --}}
        <div class="md:w-6/12 p-5">
            <img src="{{ asset("img/fondo.png") }}" alt="imagen login">
        </div>


            
            <div class="md:w-4/12 bg-gray-100 p-6 rounded-lg shadow-md mx-auto">
                <form method="POST" action="{{ route("login") }}"  novalidate>
                    @csrf
                    
                    {{-- Imprimir el mensaje asociado a la sesion (LoginController) --}}
                    @if (session("mensaje"))
                        <p class="bg-red-500 text-white rounded-lg text-center text-sm p-1.5 mb-2">
                            {{ session("mensaje") }}
                        </p>
                    @endif
                    
                    <div class="mb-5">
                        <label for="email" class="text-gray-600 font-bold mb-2 block">Correo</label>
                        <input class="border p-2 w-full rounded-lg shadow focus: border-gray-300 @error("email") border-red-500 @enderror" 
                            type="email" 
                            name="email" 
                            id="email" 
                            placeholder="Ingresa tu Correo"
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
                            placeholder="Ingresa tu Contraseña"
                        /> 
                    </div>
    
                    @error("password")
                        <p class="bg-red-500 text-white rounded-lg text-center text-sm p-1.5 mb-2">
                            {{ $message }}
                        </p>
                    @enderror

                    <div class="mb-5">
                        <input type="checkbox" name="remember" id="remember"> <label for="remember" class="text-gray-600 font-bold">Mantener mi sesion abierta</label>
                    </div>
    
                    <input class="bg-green-500 w-full hover:bg-green-600 cursor-pointer p-3 rounded-md text-white uppercase 
                    font-bold mt-4 shadow focus: border-gray-300"
                        type="submit" 
                        value="Iniciar Sesion"
                    />
    
                </form>
    
            </div>

    </div>

        


    

@endsection