<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\Users;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //$users = User::all();
    /*public function register(Request $request) {
        // Validación de datos
        $this->validate($request, [
            'nombres' => 'required|string',
            'apellido_paterno' => 'required|string',
            'apellido_materno' => 'required|string',
            'ci' => 'required|string|unique:users',
            'password' => 'required|string|min:6',
        ]);
    
        // Crear y guardar el nuevo usuario
        $user = new User();
        $user->nombres = $request->nombres;
        $user->apellido_paterno = $request->apellido_paterno;
        $user->apellido_materno = $request->apellido_materno;
        $user->ci = $request->ci;
        $user->password = Hash::make($request->password);
        $user->save();
    
        // Iniciar sesión automáticamente después del registro
        Auth::login($user);
    
        // Redirigir a una página después del registro
        return redirect(route('hermes'));
    }*/
}
