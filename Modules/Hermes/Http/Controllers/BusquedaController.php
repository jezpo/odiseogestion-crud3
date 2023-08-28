<?php

namespace Modules\Hermes\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Hermes\Entities\Programas;

class BusquedaController extends Controller
{
    public function buscarProgramas(Request $request)
    {
      $query = $request->input('q');
      $programas = Programas::where('programa', 'LIKE', "%$query%")->get();
      //dd($programas);
      return response()->json($programas);
    }
}
