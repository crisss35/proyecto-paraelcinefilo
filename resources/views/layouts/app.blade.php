<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }} ">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @stack("styles") <!-- Para aplicar hojas de css que no se requieren en todos lados -->

        <title>Para el Cinefilo - @yield("titulo")</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite("resources/css/app.css")
        @vite("resources/js/app.js")

        {{-- Añadir livewire --}}
        @livewireStyles
    </head>
    <body class="m-0 p-0 min-h-screen flex flex-col">
        <header class="bg-red-800 border-b-2 shadow">
            <div class="container mx-auto flex justify-between items-center">
                
                <a href="{{ route("home") }}">
                    <img class="w-28" src="{{ asset("img/logo_actualizado.png")}}" alt="logo">    
                </a>
                
                
                {{-- Verificar si un usuario esta autenticado --}}
                @auth
                    <nav class="flex items-center gap-3">

                        <a class="flex items-center gap-2 bg-white border p-2 text-gray-600 rounded text-sm
                        uppercase font-bold cursor-pointer" href="{{ route("posts.create") }}">
                        
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                            </svg>
                          

                            Crear
                        </a>

                        <a class="text-white font-bold" href="{{ route("posts.index", auth()->user()->username) }}">
                            Hola: <span class="font-normal">{{ auth()->user()->username }}</span>
                        </a>
                        <a class="text-white font-bold uppercase" href="{{ route("noticias") }}">NotiCines</a>
                        <a class="text-white font-bold uppercase" href="/reviews">Reviews</a>

                        <form method="POST" action="{{ route("logout") }}">
                            @csrf
                            <button type="submit" class="text-white font-bold uppercase">Cerrar Sesion</button>
                        </form>
                        
                    </nav>
                @endauth

                {{-- Cuando no esta autenticado --}}
                @guest
                      
                    <nav class="flex items-center gap-3">
                        <a class="text-white font-bold uppercase" href="{{ route("login") }}">Login</a></li>
                        <a class="text-white font-bold uppercase" href="{{ route("register") }}">Crear Cuenta</a>
                        <a class="text-white font-bold uppercase" href="{{ route("noticias") }}">NotiCines</a>
                        <a class="text-white font-bold uppercase" href="/reviews">Reviews</a>
                    </nav>

                @endguest

                
            </div>
            
            
        </header>
        
        <main class="container mx-auto mt-10 flex-grow">
            <h1 class="text-center font-black text-3xl mt-10 mb-10 text-slate-800">
                @yield("titulo")
            </h1>
            {{-- <h1 class="text-center font-black text-3xl mt-8 text-slate-800">Las Ultimas Noti<span class="text-red-800">Cines</span></h1> --}}
            <h2>@yield("contenido")</h2>
        </main>


            <footer class="bg-red-800 text-center text-white font-bold p-5 mt-10">
                Para el Cinefilo - Todos los Derechos Reservados {{ now()->year }}
            </footer>   

             

        
        @livewireScripts
    </body>
</html>
