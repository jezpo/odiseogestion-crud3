<?php

namespace Modules\Hermes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

use Illuminate\Routing\Controller;

use Modules\Hermes\Entities\Programas;
use Modules\Hermes\Entities\Documentos;
use Modules\Hermes\Entities\FlujoDocumentos;
use Modules\Hermes\Entities\Flujo_de_tramite;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProgramasController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Programas::all();
            return DataTables::of($data)
                ->addColumn('action', function($data){
                    $button = '<a href="programas/edit/'.$data->id.'" class="edit btn btn-primary btn-sm">Editar</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="programas/delete/'.$data->id.'" class="delete btn btn-danger btn-sm">Eliminar</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('hermes::programas.index');
    }

    public function store(Request $request)
    {
        Programas::create($request->all());
        return response()->json(['success' => 'Programa creado exitosamente.']);
    }

    public function edit($id)
    {
        $programa = Programas::find($id);
        return response()->json($programa);
    }

    public function update(Request $request, $id)
    {
        Programas::whereId($id)->update($request->all());
        return response()->json(['success' => 'Programa actualizado exitosamente.']);
    }

    public function destroy($id)
    {
        Programas::find($id)->delete();
        return response()->json(['success' => 'Programa eliminado exitosamente.']);
    }
}
