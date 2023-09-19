<?php

namespace Modules\Hermes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Hermes\Entities\Documentos;
use Modules\Hermes\Entities\Programas;
use Modules\Hermes\Entities\FlujoDocumentos;
use Yajra\DataTables\Facades\DataTables;

class FlujoDeDocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
            if ($request->ajax()) {
                $flujos = FlujoDocumentos::with('documento', 'programa')->get();

                return DataTables::of($flujos)
                    ->addColumn('actions', function ($flujo) {
                        $btn = '<a href="javascript:void(0)" type="button" data-toggle="tooltip" onclick="editFlujo(' . $flujo->id . ')" class="edit btn btn-primary btn-sm">Editar</a>';
                        $btn .= '&nbsp;&nbsp <button type="button" data-toggle="tooltip" name="deleteFlujo" onclick="deleteFlujo(' . $flujo->id . ')" class="delete btn btn-danger btn-sm">Eliminar</button>';
                        return $btn;
                    })
                    ->rawColumns(['actions'])
                    ->toJson();
            }

            $documentos = Documentos::all();
            $programas = Programas::all();

            return view('hermes::flujodedocumento.index', compact('documentos', 'programas'));
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
        $flujos = FlujoDocumentos::create([
            'id_documento' => $request->id_documento,
            'fecha_recepcion' => $request->fecha_recepcion,
            'id_programa' => $request->id_programa,
            'obs' => $request->obs
        ]);
    
        if ($request->ajax()) {
            // Si la solicitud es AJAX, devuelve una respuesta JSON
            return response()->json(['message' => 'Flujo de documentos creado con éxito', 'flujos' => $flujos]);
        } else {
            // Si la solicitud no es AJAX, realiza una redirección
            return back()->with('success', 'Flujo de documentos creado con éxito');
        }
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
        $flujos = FlujoDocumentos::find($id);
        $flujos->id_documento = $request->id_documento;
        $flujos->fecha_recepcion = $request->fecha_recepcion;
        $flujos->id_programa = $request->id_programa;
        $flujos->obs = $request->obs;

        $flujos->save();
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
        $flujos = FlujoDocumentos::findOrFail($id);
        $flujos->delete();
        return redirect()->route('flujodedocumento.index',  ['id' => $id]);
    }

    public function documento()
    {
        return $this->belongsTo(Documentos::class, 'id_documento');
    }
}
