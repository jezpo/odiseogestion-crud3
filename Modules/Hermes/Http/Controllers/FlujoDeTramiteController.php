<?php

namespace Modules\Hermes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Hermes\Entities\Programas;
use Modules\Hermes\Entities\FlujoTramite;
use Modules\Hermes\Entities\TipoTramite;

class FlujoDeTramiteController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $flujoTramite = FlujoTramite::all();
        $tipotramite = TipoTramite::all();
        $programas = Programas::all();
        return view('hermes::flujodetramite.index', compact('flujoTramite', 'tipotramite', 'programas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        $flujoTramite = FlujoTramite::create([
            'id_tipo_tramite' => $request->id_tipo_tramite,
            'orden' => $request->orden,
            'tiempo' => $request->tiempo,
            'estado' => $request->estado,
            'id_programa' => $request->id_programa
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
        $flujoTramite = FlujoTramite::find($id);

        $flujoTramite->id_tipo_tramite = $request->id_tipo_tramite;
        $flujoTramite->orden = $request->orden;
        $flujoTramite->tiempo = $request->tiempo;
        $flujoTramite->estado = $request->estado;
        $flujoTramite->id_programa = $request->id_programa;
        
        $flujoTramite->save();
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
        $flujoTramite = FlujoTramite::findOrFail($id);
        $flujoTramite->delete();
        return redirect()->route('flujodetramite.index',  ['id' => $id]);
    }
}
