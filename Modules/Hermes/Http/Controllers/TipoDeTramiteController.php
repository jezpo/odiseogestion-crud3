<?php

namespace Modules\Hermes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Hermes\Entities\TipoTramite;


class TipoDeTramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $tipotramite = TipoTramite::all();
        return view('hermes::tipotramite.index', compact('tipotramite'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        $tipotramite = TipoTramite::create([
            'tramite' => $request->tramite,
            'estado' => $request->estado
        ])->save();

        return back();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('hermes::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Request $request, $id)
    {
        $programa = TipoTramite::find($id);

        $programa->tramite = $request->tramite;
        $programa->estado = $request->estado;
        
        $programa->save();
        return back();
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $programa = TipoTramite::findOrFail($id);
        $programa->delete();
        return redirect()->route('tipotramite.index',  ['id' => $id]);
    }
}
