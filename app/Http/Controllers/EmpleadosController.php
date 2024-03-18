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
        return view('index_empleados', ['empleados' => $empleados]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_empleado');
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
            
            'nombre' => ['required', 'min:2', 'max:50'],
            'sueldo' => ['required', 'numeric'],
            'telefono' => ['required', 'integer'],
            'puesto' => ['required', 'min:2', 'max:50'],
            'fecha_nac' => ['required', 'date']

        ]);

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

        return view('inicio_empleados');
    }
}
