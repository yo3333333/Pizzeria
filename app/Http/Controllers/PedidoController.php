<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Pizza;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedido = Pedido::all();
        return view('pedido.index', ['pedido' => $pedido]);
    }

    /**
     * Show the form for creating a new resource.
     */
    
     public function create()
    {
        $pizzas = Pizza::all();
        return view('pedido.create', compact('pizzas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'total' => ['required', 'numeric'],
            'fecha' => ['required', 'date'],
            'idEmpleado' => 'required|integer|exists:empleados,id'

        ],
        [
            'idEmpleado.exists'=>'El id del empleado no existe',

            'total.numeric'=>'El total debe ser numerco',

            'idEmpleado.numeric'=>'El id del empleado debe de ser numerico',

            'fecha'=>'La fecha debe ser una fecha',
            
            
        ]
        );

        
        $pedido = Pedido::create($request->except('_token'));

        // Adjunta las pizzas seleccionadas al pedido
        if ($request->has('pizzas')) {
            $pizzasSeleccionadas = $request->input('pizzas');
            $pedido->pizzas()->attach($pizzasSeleccionadas);
        }
        

        return redirect('/pedido');

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $pedido_id = $request -> input('id');
        $pedido = Pedido::find($pedido_id);

        if (!$pedido){
            return redirect()->back()->with('error','El pedido con ese id no existe');
        }

        return view('pedido.show', compact('pedido'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        $pizzas = Pizza::all();
        return view('pedido.edit', compact('pedido','pizzas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        $request->validate([
            'total' => ['required', 'numeric'],
            'fecha' => ['required', 'date'],
            'idEmpleado' => 'required|integer|exists:empleados,id'
        ],
        [
            'total.numeric'=>'El total debe ser numerco',

            'idEmpleado.numeric'=>'El id del empleado debe de ser numerico',

            'fecha'=>'La fecha debe ser una fecha',

            'idEmpleado.exists'=>'El id del empleado no existe',
        ]
        );

        $pedido->update($request->except('_token', '_method', 'pizzas'));

        
        // Adjunta las pizzas seleccionadas al pedido
        if ($request->has('pizzas')) {
            $pizzasSeleccionadas = $request->input('pizzas');
            $pedido->pizzas()->sync($pizzasSeleccionadas);
        }
        else {
            $pedido->pizzas()->detach();
        }

    
        return redirect()->route('pedido.index');
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pedido_id =Pedido::find($id);

        $pedido_id->delete();

        return redirect('/pedido');
    }
}
