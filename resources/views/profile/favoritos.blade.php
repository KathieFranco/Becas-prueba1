<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Favoritas') }}
        </h2>
    </x-slot>

    <div style="background-color: #f4f4f4; padding: 10px; border-radius: 5px; margin-left: 10%;"> 



        @foreach($becas_favs as $beca)
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
        @endforeach

    </div>


</x-app-layout>