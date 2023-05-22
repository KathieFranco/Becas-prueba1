<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Favoritas') }}
        </h2>
    </x-slot>

    <link rel="stylesheet" href="{{ asset('estilo/estilofavoritos.css') }}">
    <body class="fondo">
        
    <div style="background-color: #f4f4f4; padding: 10px; border-radius: 5px; margin-left: 10%;">
    <div class="forma"> 



        @foreach($becas_favs as $beca)
            @isset($beca)
            <br>
            <h2 class="tipoB"><b>{{$beca->nombre}}</b></h2>
            @isset($beca->promedio)
            <p class="text">Promedio minimo:{{$beca->promedio}}</p>
            @endisset
            @isset($beca->sexo)
            <p class="text">Beca para:{{$beca->sexo}}</p>
            @endisset
            @isset($beca->semestre)
            <p class="text">Minimo semestre:{{$beca->semestre}}</p>
            @endisset
            @isset($beca->edad)
            <p class="text">Edad minima:{{$beca->edad}}</p>
            @endisset
            @isset($beca->carrera)
            <p class="text">Carrera:{{$beca->carrera}}</p>
            @endisset
            <p class="text">{{$beca->descripcion}}</p>
            @endisset
            @isset($beca->enlace)
            <a class="textol" href="{{ $beca->enlace }}">Enlace a la página de inscripción</a>
            @endisset
        @endforeach

        </div>
    </div>
    </body>
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>


</x-app-layout>