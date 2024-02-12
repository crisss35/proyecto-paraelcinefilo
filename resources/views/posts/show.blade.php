
@extends("layouts.app")


@section("titulo")
    {{ $post->titulo }}
@endsection


@section("contenido")
    <div class="container mx-auto md:flex">
        <div class="md:w-1/2">
            <img src="{{ asset("uploads") . "/" . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">

            <div class="p-3 flex items-center gap-3">

                @auth

                @if ( $post->checkLike(auth()->user()) )
                    <form method="POST" action="{{ route("posts.likes.destroy", $post) }}">
                        @method("DELETE")
                        @csrf
                        <div class="my-4">
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="red" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>    
                            </button>
                            
                        </div>
                    </form>
                @else
                    <form method="POST" action="{{ route("posts.likes.store", $post) }}">
                        @csrf
                        <div class="my-4">
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
                                </svg>    
                            </button>
                            
                        </div>
                    </form>    
                @endif

                
                @endauth
                  
                <p class="font-bold">{{ $post->likes()->count() }} 
                    <span class="font-semibold">Likes</span>
                </p>
            </div>

            <div>
                <p class="font-bold"> {{ $post->user->username }} </p>
                <p class="text-sm text-gray-500">
                    {{ $post->created_at->diffForHumans() }}
                </p>
                <p class="mt-5">
                    {{ $post->descripcion }}
                </p>
            </div>

            @auth
                {{-- Evaluar si el post pertenece o no a la persona que esta autenticada --}}
                @if($post->user_id === auth()->user()->id)
                    <form method="POST" action="{{ route("post.destroy", $post) }}">
                        {{-- Delete no existe en la web, solo soporta get y post asi que debo aplicar method spoofing --}}
                        {{-- Method Spoofing permite agregar otras peticiones como put, patch y delete --}}
                        @method("DELETE")
                        @csrf
                        <input 
                            type="submit"
                            value="Eliminar Publicacion"
                            class="bg-red-500 hover:bg-red-600 p-2 rounded text-white font-bold mt-4 cursor-pointer"
                        />
                    </form>
                @endif
            @endauth
            

        </div>
        <div class="md:w-1/2 p-5">
            
            <div class="shadow bg-white p-5 mb-5">
                <p class="text-2xl font-bold text-center mb-4">Agrega un nuevo comentario</p>

                @auth

                    @if(session("mensaje"))
                        {{-- Aqui invocas el mensaje --}}
                        <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
                            {{ session("mensaje") }}
                        </div>
                        
                    @endif

                    <form action="{{ route("comentarios.store", [ 'post' => $post, 'user' => $user ]) }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label for="comentario" class="text-gray-600 font-bold mb-2 block uppercase">Comenta</label>
                            <textarea
                                class="border p-2 w-full rounded-lg shadow focus: border-gray-300 @error("name") border-red-500 @enderror" 
                                id="comentario"
                                name="comentario" 
                                placeholder="Agrega un Comentario"
                            ></textarea>
                        </div>

                        @error("comentario")
                            <p class="bg-red-500 text-white rounded-lg text-center text-sm p-1.5 mb-2">
                                {{ $message }}
                            </p>
                        @enderror
                        
                        <input class="bg-green-500 w-full hover:bg-green-600 cursor-pointer p-3 rounded-md text-white uppercase 
                        font-bold mt-4 shadow focus: border-gray-300"
                            type="submit" 
                            value="Comentar"
                        />
                    </form>
                @endauth

                <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                    {{-- Si hay comentarios los muestra --}}
                    @if ($post->comentarios->count())
                        @foreach ( $post->comentarios as $comentario )
                            <div class="p-5 border-gray-300 border-b">
                                <a href="{{ route("posts.index", $comentario->user) }}" class="font-bold">
                                    {{ $comentario->user->username }}
                                </a>
                                <p>{{ $comentario->comentario }}</p>
                                <p class="text-sm text-gray-500">{{ $comentario->created_at->diffForHumans() }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="p-10 text-center">No Hay Comentarios</p>
                    @endif
                </div>

            </div>

        </div>
    </div>
@endsection