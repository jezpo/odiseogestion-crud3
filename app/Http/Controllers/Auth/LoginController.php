<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    use AuthenticatesUsers; // Uso del trait para la autenticación

    // Definir la redirección después de iniciar sesión
    //protected $redirectTo = RouteServiceProvider::HERMES;

    public function __construct()
    {
        $this->middleware('guest')->except('logout'); // Middleware para los invitados
    }

    public function register(Request $request)
    {
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
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Método para mostrar el formulario de registro
    public function showRegistrationForm()
    {
        return view('auth.register'); // Asegúrate de tener este archivo también
    }
}
