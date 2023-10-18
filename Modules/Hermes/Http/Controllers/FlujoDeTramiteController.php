<?php

namespace Modules\Hermes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Hermes\Entities\Programas;
use Modules\Hermes\Entities\FlujoTramite;
use Modules\Hermes\Entities\TipoTramite;
use Yajra\DataTables\DataTables;

class FlujoDeTramiteController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = FlujoTramite::with('tipoTramite', 'programa')->get();

            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0)" type="button" data-toggle="tooltip" onclick="editTramite(' . $data->id . ')" class="edit btn btn-primary btn-sm"><i class="fas fa-edit"></i> Editar</a>';
                    $button .= '&nbsp;&nbsp;<button type="button" data-toggle="tooltip" name="deleteFlujo" onclick="deleteTramite(' . $data->id . ')" class="delete btn btn-danger btn-sm"><i class="fas fa-trash"></i> Eliminar</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        $tipotramite = TipoTramite::all();
        $programas = Programas::all();

        return view('hermes::flujodetramite.index', compact('tipotramite', 'programas'));
    }
    public function create()
    {
        return view('hermes::flujodetramite.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_tipo_tramite' => 'required',
            'orden' => 'required',
            'tiempo' => 'required',
            'estado' => 'required',
            'id_programa' => 'required',
        ]);
    
        $flujoTramite = FlujoTramite::create($data);
    
        if ($request->ajax()) {
            return response()->json(['success' => 'Registro creado exitosamente.', 'flujoTramite' => $flujoTramite], 200);
        }
    
        return redirect()->back()->with('success', 'Registro creado exitosamente.');
    }
    public function show($id)
    {
        $flujoTramite = FlujoTramite::findOrFail($id);
        return view('hermes::flujodetramite.show', compact('flujoTramite'));
    }

    public function edit($id)
    {
        $flujoTramite = FlujoTramite::find($id);
        $tiposTramite = TipoTramite::all();
        $programas = Programas::all();

        return view('hermes::flujodetramite.edit', compact('flujoTramite', 'tiposTramite', 'programas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_tipo_tramite' => 'required',
            'orden' => 'required',
            'tiempo' => 'required',
            'estado' => 'required',
            'id_programa' => 'required',
        ]);
        $flujoTramite = FlujoTramite::findOrFail($id);
        $flujoTramite->id_tipo_tramite = $request->id_tipo_tramite;
        $flujoTramite->orden = $request->orden;
        $flujoTramite->tiempo = $request->tiempo;
        $flujoTramite->estado = $request->estado;
        $flujoTramite->id_programa = $request->id_programa;

        $flujoTramite->save();
        return redirect()->route('flujodetramite.edit', ['id' => $id])->with('success', 'Flujo de Trámite actualizado exitosamente');
    }
    public function destroy($id)
    {
        $flujoTramite = FlujoTramite::find($id);
        $flujoTramite->delete();
        return redirect()->route('flujotramite.index')
                    ->with('success','Trámite eliminado exitosamente');
    }
}
