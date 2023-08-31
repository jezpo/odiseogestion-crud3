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
        $programas = Programas::all();
        return view('hermes::programas.index', compact('programas'));
    }  
}