<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function editar()
    {
        // Obtener el usuario actualmente autenticado
        $usuario = Auth::user();

        // Retornar la vista de edición de perfil con los datos del usuario
        return view('auth.profile', compact('usuario'));
    }

    public function actualizar(Request $request)
    {
        // Validar los datos del formulario de edición de perfil
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . Auth::id(),
            // Agrega aquí más validaciones según tus necesidades
        ]);

        // Obtener el usuario actualmente autenticado
        $usuario = Auth::user();

        // Actualizar los datos del usuario con los valores del formulario
        $usuario->nombre = $request->input('nombre');
        $usuario->apellido = $request->input('apellido');
        $usuario->email = $request->input('email');

        // Guardar los cambios en la base de datos
        //$usuario->save();

        // Redirigir al usuario a la página de perfil con un mensaje de éxito
        return redirect()->route('perfil.edit')->with('success', 'Perfil actualizado exitosamente');
    }
}
