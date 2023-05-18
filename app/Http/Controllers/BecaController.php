<?php

namespace App\Http\Controllers;

use App\Models\Beca;
use Illuminate\Http\Request;

class BecaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $becas = Beca::all();
        return view('welcome')->with('becas', $becas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('becas.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request ->validate([
            'nombre'=>'required|max:255',
            'descripcion'=> 'required'
        ]);

        $beca = new Beca();
        $beca->nombre = $request->nombre;
        $beca->descripcion = $request->descripcion;
        $beca->tipo = json_encode($request->tipo);
        $beca->carrera = $request->carrera;
        $beca->edad = $request->edad;
        $beca->promedio = $request->promedio;
        $beca->sexo = $request->sexo;
        $beca->semestre = $request->semestre;
        $beca->enlace = $request->enlace;
        $beca->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Beca $beca)
    {
        return view('becas.show', compact('beca'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Beca $beca)
    {
        if (!$beca) {
            // Si no se encuentra la beca, puedes mostrar un mensaje de error o redirigir a otra página
            return redirect()->back()->with('error', 'La beca no existe');
        }
        return view('becas.edit', compact('beca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Beca $beca)
    {
        $request ->validate([
            'nombre'=>'required|max:255',
            'descripcion'=> 'required'
        ]);

        Beca::where('id', $beca->id)->update($request->except('_token','_method'));
        return redirect()->route('becas.show',$beca->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Beca $beca)
    {
        $beca->delete();
        return redirect('/');
    }
}
