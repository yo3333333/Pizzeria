@extends('layouts.app')

@section('title', 'Página de inicio')

@section('content')
<title>Listado de Empleados</title>
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
</head>    


<div class="container">
        <h1>Listado de Empleados</h1>
    
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
                    <x-original_button :pedidos="$pedidos"></x-original_button>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
@endsection


