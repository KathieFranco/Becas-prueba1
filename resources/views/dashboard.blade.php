<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Becas') }}
        </h2>
        
    </x-slot>

    <div style="background-color: #f4f4f4; padding: 10px; border-radius: 5px; margin-left: 10%; ">
        @php
            $datosBecas = $becas;
        @endphp

        @foreach ($datosBecas as $beca)
        @isset($beca)
        <br>
        <h2><b>{{$beca->nombre}}</b></h2>
        @isset($beca->promedio)
        <p>Promedio minimo:{{$beca->promedio}}</p>
        @endisset
        @isset($beca->sexo)
        <p>Beca para:{{$beca->sexo}}</p>
        @endisset
        @isset($beca->semestre)
        <p>Minimo semestre:{{$beca->semestre}}</p>
        @endisset
        @isset($beca->edad)
        <p>Edad minima:{{$beca->edad}}</p>
        @endisset
        @isset($beca->carrera)
        <p>Carrera:{{$beca->carrera}}</p>
        @endisset
        <p>{{$beca->descripcion}}</p>
        @endisset
        @isset($beca->enlace)
        <a>{{$beca->enlace}}</a>
        @endisset
        <a href="/{{$beca->id}}/edit"><button style="background-color: #92C5FC; color: #fff; border: none; padding: 8px 12px; border-radius: 3px; cursor: pointer;">Editar</button></a>
        <form action="/user/favs" method="post">
            @csrf
            <input type="text" name="beca_id" value="{{$beca->id}}" hidden>
            <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
            <button type="submit" style="background-color: #92C5FC; color: #fff; border: none; padding: 8px 12px; border-radius: 3px; cursor: pointer; float:right ;">Favorito</button>
        </form>
        <br>
        @endforeach

        <div class="col-sm-12">
            <a href="/create"><button>Añadir Beca</button></a>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
