<?php

namespace Modules\Hermes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Hermes\Entities\Documentos;
use Modules\Hermes\Entities\Programas;
use Modules\Hermes\Entities\FlujoDocumentos;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\ValidationException;

class FlujoDeDocumentosController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = FlujoDocumentos::with('documento', 'programa')->get();

            return DataTables::of($data)
                ->addColumn('actions', function ($data) {
                    $btn = '<a href="javascript:void(0)" type="button" data-toggle="tooltip" onclick="editFlujo(' . $data->id . ')" class="edit btn btn-primary btn-sm"><i class="fas fa-edit"></i> Editar</a>';
                    $btn .= '&nbsp;&nbsp;<button type="button" data-toggle="tooltip" name="deleteFlujo" onclick="deleteFlujo(' . $data->id . ')" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> Eliminar</button>';
                    return $btn;
                })
                ->rawColumns(['actions'])
                ->toJson();
        }

        $documentos = Documentos::all();
        $programas = Programas::all();

        return view('hermes::flujodedocumento.index', compact('documentos', 'programas'));
    }
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'id_documento' => 'required',
            'fecha_recepcion' => 'required',
            'id_programa' => 'required|max:5',
            'obs' => 'nullable',
        ]);

        // Crea un nuevo registro utilizando los datos del formulario
        $nuevoRegistro = new FlujoDocumentos([
            'id_documento' => $request->input('id_documento'),
            'fecha_recepcion' => $request->input('fecha_recepcion'),
            'id_programa' => $request->input('id_programa'),
            'obs' => $request->input('obs'),
        ]);

        $nuevoRegistro->save(); // Guarda el nuevo registro en la base de datos

        // Redirige a la vista de detalles o lista de registros creados
        return redirect()->back()->with('success', 'Registro creado con éxito');
    }
    public function create(Request $request)
    {
        $flujos = FlujoDocumentos::create([
            'id_documento' => $request->id_documento,
            'fecha_recepcion' => $request->fecha_recepcion ?? now(),
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

    public function show($id)
    {
        return view('hermes::flujodocumento.show');
    }

    public function edit($id)
    {
        // Recupera el registro que se va a editar
        $flujoDocumento = FlujoDocumentos::find($id);
        // Puedes agregar validaciones aquí para asegurarte de que el registro existe
        return view('flujo-documentos.edit', ['flujoDocumento' => $flujoDocumento]);
    }

    public function update(Request $request, $id)
    {
        // Valida los datos del formulario
        $request->validate([
            'id_documento' => 'required',
            'fecha_recepcion' => 'required',
            'id_programa' => 'required|max:5',
            'obs' => 'nullable',
        ]);

        // Encuentra el registro que se va a actualizar
        $flujoDocumento = FlujoDocumentos::find($id);

        // Actualiza los campos del registro con los datos del formulario
        $flujoDocumento->id_documento = $request->input('id_documento');
        $flujoDocumento->fecha_recepcion = $request->input('fecha_recepcion');
        $flujoDocumento->id_programa = $request->input('id_programa');
        $flujoDocumento->obs = $request->input('obs');

        // Guarda los cambios en la base de datos
        $flujoDocumento->save();

        // Redirige a la vista de detalles o lista de registros actualizados
        return redirect()->route('flujo-documentos.show', ['id' => $id])->with('success', 'Registro actualizado con éxito');
    }


    public function destroy($id)
    {
        $flujo = FlujoDocumentos::findOrFail($id);

        if ($flujo) {
            $flujo->delete();
            return response()->json(['message' => 'Eliminado con éxito']);
        } else {
            return response()->json(['message' => 'Documento no encontrado'], 404);
        }
    }
}
