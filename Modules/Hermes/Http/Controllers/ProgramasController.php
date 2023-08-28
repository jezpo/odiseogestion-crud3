<?php

namespace Modules\Hermes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

use Illuminate\Routing\Controller;

use Modules\Hermes\Entities\Programas;
use Modules\Hermes\Entities\Documentos;
use Modules\Hermes\Entities\FlujoDocumentos;
use Modules\Hermes\Entities\Flujo_de_tramite;
use Illuminate\Http\Request;

class ProgramasController extends Controller
{
    
    public function index()
    {
        $programas = Programas::all();
        return view('hermes::programas.index', compact('programas'));
    }
    
    public function create(Request $request)
    {
        $programa = Programas::create([
            'programa' => $request->programa,
            'id_padre' => $request->id_padre,
            'id_programa' => $request->id_programa,
            'estado' => $request->estado
        ]); 
        $programa->save();
        return back();
    }

    public function edit(Request $request, $id)
    {
        $programa = Programas::find($id);

        $programa->programa = $request->programa;
        $programa->id_padre = $request->id_padre;
        $programa->estado = $request->estado;
        $programa->id_programa = $request->id_programa;
        
        $programa->save();
        //$programa = Programas::findOrFail($id);
        //return view('programas.edit', compact('programa'));
        return back();
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'programa' => 'required|string',
            'id_padre' => 'required|integer',
            'id_programa' => 'required|string|max:5|unique:programas,id,'.$id,
            'estado' => 'required|string',
        ]);

        $programa = Programas::findOrFail($id);
        $programa->update($validatedData);

        return back();
    }

    public function destroy($id)
    {
        $programa = Programas::findOrFail($id);
        $programa->delete();
        return redirect()->route('programas.index',  ['id' => $id]);
        //return back();
    }
}