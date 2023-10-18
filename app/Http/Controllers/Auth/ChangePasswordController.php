<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class ChangePasswordController extends Controller
{
    public function changePassword(Request $request)
    {
        $user = Auth::Usuario(); // Obtén al usuario autenticado
    
        // Validación de datos
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);
    
        // Verifica que la contraseña actual sea correcta
        if (Hash::check($request->current_password, $user->password_hash)) {
            // Cambia la contraseña del usuario
            $user->password_hash = Hash::make($request->new_password);
            $user->save();
    
            return redirect()->route('home')->with('success', 'Contraseña cambiada con éxito.');
        } else {
            return back()->withErrors(['current_password' => 'La contraseña actual es incorrecta.'])->withInput();
        }
    }
}
