<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Role;
use App\Models\Permiso;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsuarios = Usuario::count();
        $totalRoles = Role::count();
        $totalPermisos = Permiso::count();

        // Obtener los últimos usuarios registrados
        $ultimosUsuarios = Usuario::latest()->take(5)->get();

        return view('dashboard.index', compact('totalUsuarios', 'totalRoles', 'totalPermisos', 'ultimosUsuarios'));
    }
}