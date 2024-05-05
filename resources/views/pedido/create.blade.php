@extends('layouts.app')

@section('title', 'Crear Pedido')

@section('content')

<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
            margin-top: 50px;
        }
        form {
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 20px;
            width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
        .alert {
            background-color: #f2dede;
            color: #a94442;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ebccd1;
            border-radius: 4px;
        }
</style>
    <h1>Crear Pedido</h1>

    <form method="POST" action="{{ route('pedido.store') }}" class="shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf <!-- Agregar el token CSRF -->

        <label for="total">Total:</label>
        <input type="text" id="total" name="total" value="{{ old('total') }}" required>

        <label for="idEmpleado">Id del Empleado:</label>
        <input type="number" id="idEmpleado" name="idEmpleado" value="{{ old('idEmpleado') }}" required>

        <label for="fecha">Fecha de pedido:</label>
        <input type="date" id="fecha" name="fecha" value="{{ old('fecha_nac') }}" required>

        <button type="submit">Guardar pedido</button>

        @if ($errors->any())
            <div class="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
@endsection
