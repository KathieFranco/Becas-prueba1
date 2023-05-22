<?php

namespace App\Http\Controllers;

use App\Models\Beca;
use App\Models\Favorito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoritoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        $id_becas = Favorito::select('beca_id')->where('user_id','=',$user_id)->distinct()->get()->pluck('beca_id')->toArray();
        $becas_favs = Beca::whereIn('id',$id_becas)->get();

        return view('profile.favoritos')->with('becas_favs',$becas_favs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $favorito = new Favorito();
        $favorito->user_id = $request->user_id;
        $favorito->beca_id = $request->beca_id;
        $favorito->save();

        return redirect()->back()->with('success', 'Agregado');
    }

    /**
     * Display the specified resource.
     */
    public function show(Favorito $favorito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Favorito $favorito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favorito $favorito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorito $favorito)
    {
        //
    }
}
