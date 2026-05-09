<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use Illuminate\Support\Facades\Session;

class AlumnoController extends Controller
{
    // ALTAS
    public function create()
    {
        return view('insertar');
    }

    public function store(Request $request)
    {
        // VALIDACIONES
        $request->validate([
            'Num_Control' => 'required|numeric',
            'Nombre' => 'required|regex:/^[\pL\s]+$/u',
            'Primer_ap' => 'required|regex:/^[\pL\s]+$/u',
            'Segundo_Ap' => 'required|regex:/^[\pL\s]+$/u',
            'Fecha_Nac' => 'required|date',
            'Semestre' => 'required|numeric|min:1|max:12',
            'Carrera' => 'required|string'
        ]);

        Alumno::create($request->all());

        Session::flash('message', 'Agregado correctamente');

        return redirect()
            ->route('alumnos.index')
            ->with('exito', 'Agregado correctamente');
    }

    // BAJAS
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();

        Session::flash('message', 'Eliminado correctamente');

        return redirect()->route('alumnos.index');
    }

    // CAMBIOS
    public function edit(Alumno $alumno)
    {
        return view('editar', compact('alumno'));
    }

    public function update(Request $request, $id)
    {
        // VALIDACIONES
        $request->validate([
            'Num_Control' => 'required|numeric',
            'Nombre' => 'required|regex:/^[\pL\s]+$/u',
            'Primer_ap' => 'required|regex:/^[\pL\s]+$/u',
            'Segundo_Ap' => 'required|regex:/^[\pL\s]+$/u',
            'Fecha_Nac' => 'required|date',
            'Semestre' => 'required|numeric|min:1|max:12',
            'Carrera' => 'required|string'
        ]);

        $alumno = Alumno::findOrFail($id);

        $alumno->Num_Control = $request->Num_Control;
        $alumno->Nombre = $request->Nombre;
        $alumno->Primer_ap = $request->Primer_ap;
        $alumno->Segundo_Ap = $request->Segundo_Ap;
        $alumno->Fecha_Nac = $request->Fecha_Nac;
        $alumno->Semestre = $request->Semestre;
        $alumno->Carrera = $request->Carrera;

        $alumno->save();

        Session::flash('message', 'Modificado correctamente');

        return redirect()->route('alumnos.index');
    }

    // CONSULTAS
    public function index(Request $request)
    {
        $filtro = $request->input('filtro');

        //$alumnos = Alumno::latest()->paginate(5);

        $alumnos = Alumno::paginate(5);
        return view('index', compact('alumnos', 'filtro'));
    }

    public function show(Alumno $alumno)
    {
        return view('detalle', compact('alumno'));
    }
}