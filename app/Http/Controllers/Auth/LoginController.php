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
    //dd($documento);
    return view('auth.login');
    /*public function register (Request $request){
        //validar los datos
        $user = new User();
        $user->nombres = $request->nombres;
        $user->napellido_paterno = $request->apellido_paterno;
        $user->napellido_materno = $request->apellido_materno;
        $user->ci = $request->ci;
        $user->password = Hash::make($request->password);
        $user->save();
        Auth::login($user);
        return redirect (route('hermes'));
    }
    public function login (Request $request){
        $credentials = [
            'ci' => request ('ci'),
            'password'=>  request ('password'),
        ];
        $remember = ($request->has('remember') ? true : false);
        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
            return redirect()->intended('hermes');
        }else{
            return redirect('login');
        }
    }
    */

}
