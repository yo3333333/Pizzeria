@extends('layouts.app')

@section('title', 'Página de inicio')

@section('content')

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

<body id="page-top">

    <h1>Listado de Empleados</h1>
    
    <table border="1">
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
            <tr>
                <td>{{ $pedido->id }}</td>
                <td>{{ $pedido->fecha }}</td>
                <td>{{ $pedido->total }}</td>
                <td>{{ $pedido->idEmpleado }}</td>
                <td>
                    <x-edit_button :pedidos="$pedido"></x-edit_button>
                            
                    <form action="{{ route('pedido.destroy', $pedido->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
                
</body>
</html>



@endsection
