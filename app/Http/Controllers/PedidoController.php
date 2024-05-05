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
        return view('pedido.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'total' => ['required', 'numeric'],
            'idEmpleado' => ['required', 'numeric'],
            'fecha' => ['required', 'date']
        ],
        [
            'total.numeric'=>'El total debe ser numerco',

            'idEmpleado.numeric'=>'El id del empleado debe de ser numerico',

            'fecha'=>'La fecha debe ser una fecha',
        ]
        );

        $data = $request->except('_token');
    
        Pedido::create($data);

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
            return redirect()->back()->with('error','El empleado con ese id no existe');
        }

        return view('pedido.show', compact('pedido'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        return view('pedido.edit', compact('pedido'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        $request->validate([
            'total' => ['required', 'numeric'],
            'idEmpleado' => ['required', 'numeric'],
            'fecha' => ['required', 'date']
        ],
        [
            'total.numeric'=>'El total debe ser numerco',

            'idEmpleado.numeric'=>'El id del empleado debe de ser numerico',

            'fecha'=>'La fecha debe ser una fecha',
        ]
        );

        Pedido::where('id', $pedido->id)->update($request->except('_token', '_method'));

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
