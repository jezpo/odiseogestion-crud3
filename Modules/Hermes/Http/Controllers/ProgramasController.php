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
                ->addColumn('action', function ($data) {
                    $button = '&nbsp;&nbsp;<a href="javascript:void(0)" type="button" data-toggle="tooltip" onclick="editProgram('.$data->id.')" class="edit btn btn-primary btn-sm ">Editar</a>';
                    $button .= '&nbsp;&nbsp;<button type="button" data-toggle="tooltip" name="deleteDocument" onclick="deleteProgram('.$data->id.')" class="delete btn btn-danger btn-sm ">Eliminar</button>';

                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('hermes::programas.index');
    }

    public function store(Request $request)
    {
        try {
            // Validación de datos
            $request->validate([
                'id_programa' => 'required',
                'programa' => 'required|max:255',
                'id_padre' => 'required|max:255',
                'estado' => 'required|in:A,I',
            ]);

            $programa = new Programas();

            $programa->id_programa = $request->id_programa;
            $programa->programa = $request->programa;
            $programa->id_padre = $request->id_padre;
            $programa->estado = $request->estado;

            $programa->save();

            return response()->json(['success' => true, 'message' => 'Programa registrado con éxito.']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Capturar errores de validación
            return response()->json(['success' => false, 'message' => 'Error de validación.', 'errors' => $e->validator->errors()]);
        } catch (\Exception $e) {
            // Capturar otros errores
            return response()->json(['success' => false, 'message' => 'Hubo un error al registrar el programa.', 'exception' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $programa = Programas::find($id);
        return response()->json($programa);
    }

    public function update(Request $request, $id)
    {
        try {
            $programa = Programas::find($id);  // Busca el programa basado en el ID. Si no lo encuentra, lanza una excepción

            $programa->id_programa = $request->id_programa;
            $programa->programa = $request->programa;
            $programa->id_padre = $request->id_padre;
            $programa->estado = $request->estado;

            $programa->save();

            return response()->json(['success' => true, 'message' => 'Programa actualizado con éxito.']);
        } catch (\Exception $e) {
            // En una aplicación real, querrías registrar el error. Aquí solo devolvemos un mensaje genérico.
            return response()->json(['success' => false, 'message' => 'Hubo un error al actualizar el programa.']);
        }
    }


    public function destroy($id)
    {
        Programas::find($id)->delete();
        return response()->json(['success' => 'Programa eliminado exitosamente.']);
    }
}
