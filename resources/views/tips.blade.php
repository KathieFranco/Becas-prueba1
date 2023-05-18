<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Becas') }}
        </h2>
        
    </x-slot>
    
    <div class="container">
        <div class="header">
            <h1>Tips para Becas</h1>
        </div>
        <p>Investiga y comprende los requisitos: Lee detenidamente los requisitos de la beca para asegurarte de que cumples con todas las condiciones antes de aplicar. Asegúrate de entender los criterios de elegibilidad, la documentación requerida y las fechas límite.</p>
    </div><br><br>
    <div class="container">

        @php 
            $datosTips = $comment;
        @endphp

        @foreach ($datosTips as $comment)
            @isset($comment)
            <h3>{{$comment->body}}</h3><br>
            @endisset
        @endforeach

        <div class="tips-form">
            

            <form method="post" action="/tips" enctype="multipart/form-data">
                 @csrf
                <label for="body">Tip:</label>
                <textarea name="body" required></textarea><br>
                <input type="submit" value="Enviar Tip">
        </form>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>
</x-app-layout>