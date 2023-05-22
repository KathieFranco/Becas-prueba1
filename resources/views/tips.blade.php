<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tips') }}
        </h2>
        
    </x-slot>
    <link rel="stylesheet" href="{{ asset('estilo/estilotips.css') }}">
    <body class="fondo">
        
    
        <div class="container">
        <div class="header">
            <h1 >Tips para Becas</h1>
        </div>
        <p><p class="text">Investiga y comprende los requisitos:</p> Lee detenidamente los requisitos de la beca para asegurarte de que cumples con todas las condiciones antes de aplicar. Asegúrate de entender los criterios de elegibilidad, la documentación requerida y las fechas límite.</p>
        </div><br><br>
        <div class="container">


    

        <div class="tips-form">
            

            <form method="post" action="/tips" enctype="multipart/form-data">
                 @csrf
                <label for="body" class="ttext">Escriba su tip:</label>
                <textarea class="tareatex" name="body" required></textarea><br>
                <div class="button">
                <input class="button" type="submit" value="Enviar tip">
                </div>
        </form>
        <h2 class="titulotip">Tips</h2>
        @php 
            $datosTips = $comment;
        @endphp

        @foreach ($datosTips as $comment)
            @isset($comment)
            <h3 class="comentario">{{$comment->body}}</h3><br>
            @endisset
        @endforeach
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