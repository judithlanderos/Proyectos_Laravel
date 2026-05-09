<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // VISTA LOGIN
    public function login()
    {
        return view('login');
    }

    // VISTA REGISTRO
    public function registro()
    {
        return view('registro');
    }

   public function guardarRegistro(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'correo' => 'required|email|unique:usuarios,correo',
        'password' => 'required|min:4'
    ]);

    Usuario::create([
        'nombre' => $request->nombre,
        'correo' => $request->correo,
        'password' => Hash::make($request->password)
    ]);

    return redirect()
        ->route('alumnos.index')
        ->with('success', 'Usuario creado correctamente');
}
    // INICIAR SESION
    public function iniciarSesion(Request $request)
    {
        $usuario = Usuario::where('correo', $request->correo)->first();

        if (!$usuario) {
            return redirect()
                ->route('registro')
                ->with('error', 'El usuario no existe, crea una cuenta');
        }

        if (!Hash::check($request->password, $usuario->password)) {
            return back()->with('error', 'Contraseña incorrecta');
        }

        Session::put('usuario', $usuario);

        return redirect()->route('alumnos.index');
    }

    // CERRAR SESION
    public function logout()
    {
        Session::forget('usuario');

        return redirect()->route('login');
    }
}