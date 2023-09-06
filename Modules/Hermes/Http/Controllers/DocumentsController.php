<?php

namespace Modules\Hermes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Yajra\DataTables\DataTables;
use Modules\Hermes\Entities\Documentos;
use Modules\Hermes\Entities\Programas;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DocumentsController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $documentos = Documentos::list_documents();

            return DataTables::of($documentos)
                ->addColumn('action', function ($documentos) {
                    $btn = '<a href="javascript:void(0)" type="button" name="viewDocument" onclick="loadPDF(' . $documentos->id . ')" class="view btn btn-yellow btn-sm">Ver</a>';
                    $btn .= '&nbsp;&nbsp;<a href="javascript:void(0)" type="button" data-toggle="tooltip" onclick="editDocument(' . $documentos->id . ')" class="edit btn btn-primary btn-sm ">Editar</a>';
                    $btn .= '&nbsp;&nbsp;<button type="button" data-toggle="tooltip" name="deleteDocument" onclick="deleteDocument(' . $documentos->id . ')" class="delete btn btn-danger btn-sm ">Eliminar</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        $programas = Programas::all();
        return view('hermes::documento.index', compact('programas'));
    }

    public function edit($id)
    {
        if (request()->ajax()) {
            $documentos = Documentos::select('id', 'cite', 'descripcion', 'estado', 'id_tipo_documento', 'id_programa')->find($id);
            //$documentos = Documentos::find($id);
        }
        if (!$documentos) {
            return response()->json(['error' => 'Documento no encontrado'], 404);
        }
        return response()->json($documentos);
    }


    public function store(Request $request)
    {
        $request->validate([
            'cite' => 'required',
            'descripcion' => 'required',
            'id_tipo_documento' => 'required',
            'documento' => 'required',
            'id_programa' => 'required',
        ]);

        // Obtener el archivo y el nombre del archivo
        $archivo = $request->file('documento');
        $name_document = time() . '_' . $archivo->getClientOriginalName();

        // Guardar el contenido binario directamente
        $contenidoArchivo = file_get_contents($archivo->getRealPath());

        // Almacenar el contenido binario y otros datos en la base de datos
        $documento = new Documentos;
        $documento->cite = $request->cite;
        $documento->descripcion = $request->descripcion;
        $documento->estado = $request->estado;
        $documento->id_tipo_documento = $request->id_tipo_documento;
        $documento->hash = hash_file('md5', $request->documento);
        $documento->documento = $contenidoArchivo; // Guardas el contenido binario
        $documento->name_document = $name_document;
        $documento->id_programa = $request->id_programa;
        $documento->save();

        return redirect()->route('hermes::documents.index')->with('success', 'Documento creado exitosamente');
    }
    
    public function update(Request $request, $id)
    {
        $documentos = Documentos::find($id);

        if (!$documentos) {
            return response()->json(['error' => 'Documento no encontrado'], 404);
        }

        $documentos->cite = $request->cite;
        $documentos->descripcion = $request->descripcion;
        $documentos->estado = $request->estado;
        $documentos->id_tipo_documento = $request->id_tipo_documento;
        $documentos->documento = $request->documento;
        $documentos->id_programa = $request->id_programa;

        //$documentos->update($request->all());
        if ($documentos->save()) {
            return response()->json(['message' => 'Documento actualizado con éxito']);
        } else {
            return response()->json(['error' => 'Error al actualizar el documento'], 500);
        }
    }


    public function destroy($id)
    {
        Documentos::findOrFail($id)->delete();
        return response()->json(['message' => 'Registro Eliminado exitosamante']);
    }


    public function show($id)
    {
        $documento = Documentos::select('id', 'cite', 'descripcion', 'estado', 'id_tipo_documento', 'id_programa')->find($id);
        if (!$documento) {
            return response()->json(['error' => 'Documento no encontrado'], 404);
        }
        return response()->json($documento);
    }

    //como convierto pdf para la vista 

    public function downloadPdf($id)
    {
        $documento = Documentos::find($id);

        // Si el documento existe
        if ($documento) {
            // Si el documento está almacenado como un recurso, convertirlo a una cadena de bytes
            $pdfData = is_resource($documento->documento) ? stream_get_contents($documento->documento) : $documento->documento;
            // Codificar el documento a base64
            $pdfBase64 = base64_encode($pdfData);
            return response()->json(['base64' => $pdfBase64]);
        } else {
            return response()->json(['message' => 'Documento no encontrado'], 404);
        }
    }
}
