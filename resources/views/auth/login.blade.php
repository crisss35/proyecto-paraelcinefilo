@extends("layouts.app")


@section("contenido")

    <div class="md:flex gap-2">
        <div class="md:w-1/2">
            <img src="{{asset("img/fondo.png")}}" alt="">
        </div>
        <div class="md:w-1/2 bg-gray-300 p-10 rounded-sm shadow mt-4">

            <h1 class="text-2xl text-center font-bold text-gray-700 mb-3">Inicio de Sesion</h1>

            <form>
                <div class="mb-5">
                    <label class="text-gray-600 font-bold mb-2 block">Correo</label>
                    <input class="border p-2 w-full rounded-lg" type="email" name="email" id="email" placeholder="Correo">    
                </div>
                
                <div class="mb-5">
                    <label class="text-gray-600 font-bold mb-2 block">Contraseña</label>
                    <input class="border p-2 w-full rounded-lg" type="password" name="password" id="password" placeholder="Contraseña"> 
                </div>

                <input class="bg-cyan-600 w-full hover:bg-cyan-700 cursor-pointer p-3 rounded-md text-white uppercase font-bold
                mt-4"
                type="submit" value="Ingresar">

                <a href="/crear-cuenta">Registrarse</a>
            </form>

        </div>
    </div>

        


    

@endsection