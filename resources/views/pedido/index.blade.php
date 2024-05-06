@extends('layouts.app')

@section('title', 'Página de inicio')

@section('content')
<title>Listado de Pedidos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            margin-top: 50px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        form {
            display: inline;
        }
    </style>


<div class="container">
        <h1>Listado de Pedidos</h1>
    
        <form action="{{ url('/pedido/show') }}" method="GET">
                        <div class="sub">
                            <label for="id">Buscar pedido por ID:</label>
                            <input class="cuadro-buscar" type="id" id="id" name="id" placeholder="12" autofocus="">
                        </div><br><br>
                        <label for="enviar"></label>
                        <input type="submit" id="enviar" name="enviar">
        </form>

        @if (session('error'))
                    {{
                        session('error')
                    }}
                    @endif


    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Fecha</th>
                <th>Total</th>
                <th>Id del empleado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pedido as $pedidos)
            <tr>
                <td>{{ $pedidos->id }}</td>
                <td>{{ $pedidos->fecha }}</td>
                <td>{{ $pedidos->total }}</td>
                <td>{{ $pedidos->idEmpleado }}</td>
                <td>
                    <x-edit_button :pedidos="$pedidos"></x-edit_button>

                    <form action="{{ route('pedido.destroy', $pedidos->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection