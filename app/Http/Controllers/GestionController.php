<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;

class GestionController extends Controller
{
    public function mostrarGestion()
    {
        $fechaActual = new DateTime(); // Obtiene la fecha y hora actual
        $anioActual = $fechaActual->format('Y'); // Obtiene el año actual
        $mesActual = $fechaActual->format('m'); // Obtiene el mes actual

        $gestion = ($mesActual >= 1 && $mesActual <= 7) ? '01' : '02';
        $gestionCompleta = $anioActual . '-' . $gestion;

        // Suponiendo que tu vista se llama 'gestion', puedes retornarla de la siguiente manera:
        return view('gestion', compact('gestionCompleta'));
    }
}
