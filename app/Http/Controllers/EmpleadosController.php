<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleados::all();
        return view('index_empleado', ['empleados' => $empleados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crear_empleado');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'min:3', 'max:50'],
            'sueldo' => ['required', 'numeric'],
            'telefono' => ['required', 'integer','digits_between:8,10'],
            'puesto' => ['required', 'min:4', 'max:50'],
            'fecha_nac' => ['required', 'date']
        ],
        [
            'nombre.min'=>'El nombre debe tener minimo 3 caracteres',
            'nombre.max'=>'El nombre debe tener maximo 50 caracteres',

            'sueldo.numeric'=>'El sueldo debe ser numerco',

            'telefono.digits_between'=>'El telefono debe de tener minimon 8 numeros y maximo 10',
            'telefono.integer'=>'El telefono debe ser un numero',

            'puesto.min'=>'El puesto deb ser minimo 4 caracteres',
            'puesto.max'=>'El puesto deb ser maximo 50 caracteres',

            'fecha_nac.date'=>'La fecha debe ser una fecha',
        ]
        );
        
        

        Empleados::create($request->all());
        return view('inicio_empleados');

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $empleado_id = $request -> input('id');
        $empleado = Empleados::find($empleado_id);

        if (!$empleado){
            return redirect()->back()->with('error','El empleado con ese id no existe');
        }

        return view('show_empleado', compact('empleado'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleados $empleados)
    {
        return view('edit_empleado', compact('empleados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleados $empleados)
    {
        $validated = $request->validate([
            'nombre' => ['required', 'min:3', 'max:50'],
            'sueldo' => ['required', 'numeric'],
            'telefono' => ['required', 'integer','digits_between:8,10'],
            'puesto' => ['required', 'min:4', 'max:50'],
            'fecha_nac' => ['required', 'date']
        ],
        [
            'nombre.min'=>'El nombre debe tener minimo 3 caracteres',
            'nombre.max'=>'El nombre debe tener maximo 50 caracteres',

            'sueldo.numeric'=>'El sueldo debe ser numerco',

            'telefono.digits_between'=>'El telefono debe de tener minimon 8 numeros y maximo 10',
            'telefono.integer'=>'El telefono debe ser un numero',

            'puesto.min'=>'El puesto deb ser minimo 4 caracteres',
            'puesto.max'=>'El puesto deb ser maximo 50 caracteres',

            'fecha_nac.date'=>'La fecha debe ser una fecha',
        ]
        );
        Empleados::where('id', $empleados->id)->update($request->except('_token', '_method'));

        return view('inicio_empleados');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $empleado_id = Empleados::find($id);

        $empleado_id->delete();

        return redirect('/empleados');
    }
}
