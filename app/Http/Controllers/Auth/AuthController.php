<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'registration', 'postLogin', 'postRegistration', 'showFoto']]);
    }
    public function index()
    {
        return view('auth.login');
    }
    public function registration()
    {
        return view('auth.register');
    }
    public function postLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'ci' => 'required|string',  // Validamos el CI
            'password' => 'required'
        ]);

        // 2. Si la validación falla, retornar errores
        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "errors" => $validator->errors()
            ]);
        } else {
            // 3. Intentar autenticar al usuario usando el CI y la contraseña
            if (Auth::attempt(['ci' => $request->ci, 'password' => $request->password])) {
                return response()->json([
                    "status" => true,
                    "redirect" => url("dashboard")
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "errors" => ["Invalid credentials"]
                ]);
            }
        }
    }
    public function postRegistration(Request $request)
    {
        // 1. Validar los datos de entrada según la estructura de la tabla usuarios
        $validator = Validator::make($request->all(), [
            'nombres' => 'required|string|max:100',
            'apellido_paterno' => 'required|string|max:100',
            'apellido_materno' => 'required|string|max:100',
            'username' => 'required|string|max:50|unique:usuarios',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|string|min:6|same:password',
            'ci' => 'nullable|string|max:100',
            'foto' => 'nullable|image|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => false,
                "errors" => $validator->errors()
            ]);
        }

        // 3. Crear y guardar el nuevo usuario en la base de datos
        $usuario = new Usuario();
        $usuario->nombres = $request->nombres;
        $usuario->apellido_paterno = $request->apellido_paterno;
        $usuario->apellido_materno = $request->apellido_materno;
        $usuario->username = $request->username;
        $usuario->password_hash = Hash::make($request->password);  // Hasheamos la contraseña
        $usuario->ci = $request->ci;


        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $usuario->foto = file_get_contents($foto->getRealPath());
        }

        $usuario->save();


        Auth::login($usuario);

        return response()->json([
            "status" => true,
            "redirect" => url("dashboard")
        ]);
    }
    public function dashboard()
    {
        if (Auth::check()) {
            return view("dashboard");
        }
        return redirect("login")->withSuccess("Ups No tiene Accesos");
    }
    public function create(array $data)
    {
        return Usuario::create([
            'nombres' => $data['nombres'],
            'apellido_paterno' => $data['apellido_paterno'],
            'apellido_materno' => $data['apellido_materno'],
            'username' => $data['username'],
            'password_hash' => Hash::make($data['password']),
            'ci' => $data['ci'],

        ]);
    }
    public function logout()
    {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
    public function showFoto($userId)
    {
        if (auth()-> user()->id != $userId){
            abort(403, 'Accion no autorizada');
        }
        $usuario = Usuario::findOrFail($userId);
        $fotoContent = $usuario->foto;

        return response($fotoContent)->header('Content-Type', 'image/jpeg');  // Asumiendo que las imágenes son JPEG
    }

    public function sidebar()
    {

        $usuario = Usuario::find(auth()->user()->id);
        return view('includes.sidebar', compact('usuario'));
    }
}
