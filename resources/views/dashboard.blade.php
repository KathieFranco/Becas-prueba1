<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Becas') }}
        </h2>
    </x-slot>

    <title>BKT - Becas para todes</title>
    
    <link rel="stylesheet" href="{{ asset('estilo/estilobecas.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-M8/Z6rZlbu1ZN3ZWaP8Q7Lssg3o+TJe4zj0wk9Xj47TnTqL9zC5i09hRleesZGKp86LrsqVHXaD+yfOoB7tZ9Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <div class="fondo">
        <div>
            <a href="/create"><button class="nuevabeca">Añadir Beca</button></a>
        </div>
        <div class="mr-2">
            <div class="checkbox-row">
                <form action="{{ route('dashboard.filtrar') }}" method="POST">
                    @csrf
                    <label>
                        <input type="checkbox" name="tipo[]" value="deportiva"> Deportiva
                    </label>
                    <label>
                        <input type="checkbox" name="tipo[]" value="intercambio"> Intercambio
                    </label>
                    <label>
                        <input type="checkbox" name="tipo[]" value="sobresaliente"> Sobresaliente
                    </label>
                    <label>
                        <input type="checkbox" name="tipo[]" value="economica"> Económica
                    </label>
                    <label>
                        <input type="checkbox" name="tipo[]" value="investigacion"> Investigación
                    </label>
                    <button type="submit" class="btn-filtrar">Filtrar</button>
                    <a href="{{ route('dashboard') }}" class="link-filtros">Restablecer filtros</a>
                </form>
            </div>
        </div>
        @if ($becasFiltradas->isNotEmpty())
            <h2>Becas coincidentes:</h2>
            <br>
            @foreach ($becasFiltradas as $beca)
                <p class="nombeca">{{ $beca->nombre }}</p>
                @isset($beca->promedio)
                    <p class="texto">Promedio mínimo: {{$beca->promedio}}</p>
                @endisset
                @isset($beca->sexo)
                    <p class="texto">Beca para: {{$beca->sexo}}</p>
                @endisset
                @isset($beca->semestre)
                    <p class="texto">Mínimo semestre: {{$beca->semestre}}</p>
                @endisset
                @isset($beca->edad)
                    <p class="texto">Edad mínima: {{$beca->edad}}</p>
                @endisset
                @isset($beca->carrera)
                    <p class="texto">Carrera: {{$beca->carrera}}</p>
                @endisset
                <p class="texto">{{$beca->descripcion}}</p>
                @isset($beca->enlace)
                    <a class="textol" href="{{ $beca->enlace }}">Enlace a la página de inscripción</a>
                @endisset
                <br>
            @endforeach
        @else
            @php
                $datosBecas = $becas;
            @endphp
            @foreach ($datosBecas as $beca)
                @isset($beca)
                    <br>
                    <div class="forma">
                        <a href="/{{$beca->id}}/edit" class="editar">
                            <span class="pencil-icon">&#9998;</span>
                        </a>
                        <form action="/user/favs" method="post">
                            @csrf
                            <button class="favorito" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 100 100">
                                    <polygon points="50 0 64 36 100 36 70 59 82 100 50 75 18 100 30 59 0 36 36 36" fill="yellow" stroke="black" stroke-width="2"/>
                                </svg>
                            </button>
                            <input type="text" name="beca_id" value="{{$beca->id}}" hidden>
                            <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                        </form>
                        <h2 class="nombeca"><b> {{$beca->nombre}}</b></h2>
                        @isset($beca->promedio)
                            <p class="texto">Promedio mínimo: {{$beca->promedio}}</p>
                        @endisset
                        @isset($beca->sexo)
                            <p class="texto">Beca para: {{$beca->sexo}}</p>
                        @endisset
                        @isset($beca->semestre)
                            <p class="texto">Mínimo semestre: {{$beca->semestre}}</p>
                        @endisset
                        @isset($beca->edad)
                            <p class="texto">Edad mínima: {{$beca->edad}}</p>
                        @endisset
                        @isset($beca->carrera)
                            <p class="texto">Carrera: {{$beca->carrera}}</p>
                        @endisset
                        <p class="texto"> {{$beca->descripcion}}</p>
                    @endisset
                    @isset($beca->enlace)
                        <a class="textol" href="{{ $beca->enlace }}">Enlace a la página de inscripción</a>
                    @endisset
                    </div>

                    <br>
                @endforeach
            </div>
        @endif

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <x-welcome />
                </div>
            </div>
        </div>
</x-app-layout>
