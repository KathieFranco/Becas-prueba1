<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BKT Encuentra tu beca</title>
        <link rel="stylesheet" href="styles.css" type="text/css">
    </head>
    <body>
        <div>
            <div class="container">
                <form action="/" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-25">
                            <label for="nombre"> Nombre:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="nombre" name="nombre" value="{{old('nombre')}}"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="descripcion"> Descripcion:</label>
                        </div>
                        <div class="col-75">
                            <textarea id="descripcion" name="descripcion" placeholder="Detalles de la beca" >{{old('descripcion')}}</textarea><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="tipo"> Tipo:</label>
                        </div>
                        <div class="col-75">
                            <input type="checkbox" id="deportiva" name="tipo[]" value="deportiva" {{ in_array('deportiva', old('tipo', [])) ? 'checked' : '' }}>Deportiva<br>
                            <input type="checkbox" id="intercambio" name="tipo[]" value="intercambio" {{ in_array('intercambio', old('tipo', [])) ? 'checked' : '' }}>Intercambio<br>
                            <input type="checkbox" id="sobresaliente" name="tipo[]" value="sobresaliente" {{ in_array('sobresaliente', old('tipo', [])) ? 'checked' : '' }}>Sobresaliente<br>
                            <input type="checkbox" id="economica" name="tipo[]" value="economica" {{ in_array('economica', old('tipo', [])) ? 'checked' : '' }}>Economica<br>
                            <input type="checkbox" id="investigacion" name="tipo[]" value="investigacion" {{ in_array('investigacion', old('tipo', [])) ? 'checked' : '' }}>Investigacion<br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="carrera"> Carrera:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="carrera" name="carrera" value="{{old('carrera')}}"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="edad"> Edad:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="edad" name="edad" value="{{old('edad')}}"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="promedio"> Promedio:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="promedio" name="promedio" value="{{old('promedio')}}"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="semestre"> Semestre:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="semestre" name="semestre" value="{{old('semestre')}}"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="sexo"> Sexo:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" id="sexo" name="sexo" value="{{old('sexo')}}"><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="enlace"> Enlace:</label>
                        </div>
                        <div class="col-75">
                            <textarea id="enlace" name="enlace" placeholder="Enlace a la beca">{{old('enlace')}}</textarea><br>
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