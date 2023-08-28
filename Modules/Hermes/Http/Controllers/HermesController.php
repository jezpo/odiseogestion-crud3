<?php

namespace Modules\Hermes\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Hermes\Entities\Documentos;
use Modules\Hermes\Entities\Programas;
use DataTables;


class HermesController extends Controller
{  
    public function index() {
        //return datatables()->eloquent(Documentos::query())->toJson();
        if(request()->ajax()){
        return datatables()->of(Documentos::select('id','cite','descripcion', 'estado', 'id_tipo_documento', 'id_programa'))
        ->editColumn('created_at', function ($request){
            return $request->created_at->format('d-m-Y H:i');
        })
        ->addColumn('action', 'pages.document-action')
        ->rawIndexColumn()
        ->make(true);
    }
    return view('pages.index');
    }

    public function create(Request $request)
    {
        $request->validate([
            'cite' => 'required',
            'descripcion' => 'required',
            'id_tipo_documento' => 'required',
            'documento' => 'required',
            'id_programa' => 'required',
        ]);
        $archivo = $request->file('documento');
        $nombrearchivo = $archivo->getClientOriginalName();
        $documento = Documentos::create([
            'cite' => $request->cite,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado,
            'id_tipo_documento' => $request->id_tipo_documento,
            'hash' =>  hash_file('md5', $request->documento),
            'documento' => $archivo->store('documentos', 'public'),
            'name_document' => (string)$nombrearchivo,
            'id_programa' => $request->id_programa,
        ]); 
        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'cite' => 'required',
        'descripcion' => 'required',
        'id_tipo_documento' => 'required',
        'id_programa' => 'required',
    ]);

    $documento = Documentos::findOrFail($id);

    $documento->cite = $request->cite;
    $documento->descripcion = $request->descripcion;
    $documento->estado = $request->estado;
    $documento->id_tipo_documento = $request->id_tipo_documento;
    $documento->id_programa = $request->id_programa;

    if ($request->hasFile('documento')) {
        $archivo = $request->file('documento');
        $nombrearchivo = $archivo->getClientOriginalName();

        $documento->hash = hash_file('md5', $request->documento);
        $documento->documento = $archivo->store('documentos', 'public');
        $documento->name_document = (string)$nombrearchivo;
    }

    $documento->save();

    return response()->json(['success' => true]);
}
    
    
    public function destroy($id)
    {
        $documento = Documentos::find($id)->delete();
        return response()->json(['success'=>'registro borrado con exito']);
        
    }
   
}