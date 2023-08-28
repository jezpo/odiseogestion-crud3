<?php

namespace Modules\Hermes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Hermes\Entities\Documentos;
use Modules\Hermes\Entities\Programas;
use Modules\Hermes\Entities\FlujoDocumentos;

class FlujoDeDocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $flujosdoc = FlujoDocumentos::all();
        $documentos = Documentos::all();
        $programas = Programas::all();
        return view('hermes::flujodedocumento.index', compact('flujosdoc', 'documentos', 'programas'));
    }
    
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        $flujosdoc = FlujoDocumentos::create([
            'id_documento' => $request->id_documento,
            'fecha_recepcion' => $request->fecha_recepcion,
            'id_programa' => $request->id_programa,
            'obs' => $request->obs
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
        return view('hermes::flujodocumento.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Request $request, $id)
    {
        $flujosdoc = FlujoDocumentos::find($id);
        $flujosdoc->id_documento = $request->id_documento;
        $flujosdoc->fecha_recepcion = $request->fecha_recepcion;
        $flujosdoc->id_programa = $request->id_programa;
        $flujosdoc->obs = $request->obs;
        
        $flujosdoc->save();
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
        $validatedData = $request->validate([
            'id_documento' => 'required',
            'fecha_recepcion' => 'required',
            'id_programa' => 'required',
            'obs' => 'nullable',
        ]);

        $flujoDoc = FlujoDocumentos::findOrFail($id);
        $flujoDoc->fill($validatedData);
        $flujoDoc->save();

        return back()->with('success', 'Flujo de documentos actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $flujosdoc = FlujoDocumentos::findOrFail($id);
        $flujosdoc->delete();
        return redirect()->route('flujodedocumento.index',  ['id' => $id]);
    }
}
