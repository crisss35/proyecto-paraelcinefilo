<div>
    @if ($posts->count())
        <article class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($posts as $post)
                <div>
                    {{-- Routing para mostrar una publicacion --}}
                    <a href="{{ route("posts.show", ['post' => $post, 'user' => $post->user]) }}"> {{-- Las imagenes estan guardadas en la carpeta uploads --}}
                        <img src="{{ asset("uploads") . "/" . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
                    </a>
                </div>
            @endforeach    
        </article>

        <div class="my-10">
            {{ $posts->links('pagination::tailwind') }}
        </div>
    @else
        <p class="text-center">No hay posts, debes seguir a alguien</p>
    @endif
</div>