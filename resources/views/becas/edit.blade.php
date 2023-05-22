<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('estilo/estiloeditar.css') }}">

        <title>BKT Encuentra tu beca</title>

    </head>
    <body class="fondo">
        <div>
            
            @php
                $tipo = json_decode($beca->tipo);
            @endphp
            <div class="container">
            <h2 class="titulo">Modo edición</h2>
                <form action="/{{$beca->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-25">
                            <label for="nombre"> Nombre:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="nombre" name="nombre" value="{{old('nombre') ?? $beca->nombre}}"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="descripcion"> Descripcion:</label>
                        </div>
                        <div class="col-75">
                            <textarea id="descripcion" name="descripcion" placeholder="Detalles de la beca">{{old('descripcion') ?? $beca->descripcion}}</textarea><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="tipo"> Tipo:</label>
                        </div>
                        <div class="col-75">
                            <input type="checkbox" id="deportiva" name="tipo[]" value="deportiva" {{ in_array('deportiva', $tipo) ? 'checked' : '' }}>Deportiva<br>
                            <input type="checkbox" id="intercambio" name="tipo[]" value="intercambio" {{ in_array('intercambio', $tipo) ? 'checked' : '' }}>Intercambio<br>
                            <input type="checkbox" id="sobresaliente" name="tipo[]" value="sobresaliente" {{ in_array('sobresaliente', $tipo) ? 'checked' : '' }}>Sobresaliente<br>
                            <input type="checkbox" id="economica" name="tipo[]" value="economica" {{ in_array('economica', $tipo) ? 'checked' : '' }}>Economica<br>
                            <input type="checkbox" id="investigacion" name="tipo[]" value="investigacion" {{ in_array('investigacion', $tipo) ? 'checked' : '' }}>Investigacion<br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="carrera"> Carrera:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="carrera" name="carrera" value="{{old('carrera') ?? $beca->carrera}}"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="edad"> Edad:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="edad" name="edad" value="{{old('edad') ?? $beca->edad}}"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="promedio"> Promedio:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="promedio" name="promedio" value="{{old('promedio') ?? $beca->promedio}}"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="semestre"> Semestre:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="semestre" name="semestre" value="{{old('semestre') ?? $beca->semestre}}"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="sexo"> Sexo:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="sexo" name="sexo" value="{{old('sexo') ?? $beca->sexo}}"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="enlace"> Enlace:</label>
                        </div>
                        <div class="col-75">
                            <textarea id="enlace" name="enlace" placeholder="Enlace a la beca">{{old('enlace') ?? $beca->enlace}}</textarea><br>
                        </div>
                    </div>

                    <input type="submit" value="Enviar">
                </form>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>