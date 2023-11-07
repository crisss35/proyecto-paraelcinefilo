@extends("layouts.app")

@section("titulo")
    NotiCines
@endsection

@section("contenido")

    <section class="grid grid-cols-3 gap-3 mb-10">
        <div class="bg-red-800 p-5 rounded-b-3xl">
            <img class="rounded-lg" src="{{ asset("img/aquaman.png") }}" alt="">
            
            <div class="bg-slate-800 mt-3 rounded-md font-bold p-3 text-center text-xl text-white">
                <p>¿Que Pasara con Aquaman 2?</p>         
            </div>
            
        </div>
        <div class="bg-red-800 p-5 rounded-b-3xl">
            <img class="rounded-lg" src="{{ asset("img/billy.jpg") }}" alt="">  
            <div class="bg-slate-800 mt-3 rounded-md font-bold p-3 text-center text-xl text-white">
                <p>¿Que Debes Saber Sobre Saw X?</p>        
            </div>
        </div>
        <div class="bg-red-800 p-5 rounded-b-3xl">
            <img class="rounded-lg" src="{{ asset("img/buggy.jpg") }}" alt="">
            <div class="bg-slate-800 mt-3 rounded-md font-bold p-3 text-center text-xl text-white">
                <p>Buggy Chiquito</p>             
            </div>   
        </div>
    </section>

    
    
@endsection