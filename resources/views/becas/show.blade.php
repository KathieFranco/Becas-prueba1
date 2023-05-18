<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>BKT Encuentra tu beca</title>
        <script src="resources\css\styles.css"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    </head>
    <body>
        <div>
            @isset($beca)
            <h3>{{$beca->nombre}}</h3>
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

            <a href="/{{$beca->id}}/edit"><button>Editar</button></a>
            <form action="/{{$beca->id}}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" value="Eliminar">
            </form>
        </div>
    </body>
</html>