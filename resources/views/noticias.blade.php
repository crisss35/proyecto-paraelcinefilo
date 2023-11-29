@extends("layouts.app")

@section("titulo")
    NotiCines
@endsection

@section("contenido")

    <section class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-10 mt-10">
        <div class="bg-gray-100 p-5 rounded-b-3xl shadow-md">
            <img class="rounded-lg" src="{{ asset("img/aquaman.png") }}" alt="">
            
            <div class="bg-slate-800 mt-10 rounded-md font-bold p-3 text-center text-xl text-white">
                <p>¿Que Pasara con Aquaman 2?</p>         
            </div>
            
        </div>
        <div class="bg-gray-100 p-5 rounded-b-3xl shadow-md">
            <img class="rounded-lg" src="{{ asset("img/billy.jpg") }}" alt="">  
            <div class="bg-slate-800 mt-10 rounded-md font-bold p-3 text-center text-xl text-white">
                <p>¿Que Debes Saber Sobre Saw X?</p>        
            </div>
        </div>
        <div class="bg-gray-100 p-5 rounded-b-3xl shadow-md">
            <img class="rounded-lg" src="{{ asset("img/buggy.jpg") }}" alt="">
            <div class="bg-slate-800 mt-10 rounded-md font-bold p-3 text-center text-xl text-white">
                <p>Buggy Chiquito</p>             
            </div>   
        </div>
    </section>

    
    
@endsection