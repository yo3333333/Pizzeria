<!DOCTYPE html>
<html>
<head>
    <title>Listado de Empleados</title>
</head>
<body>
    <h1>Listado de Empleados</h1>
    
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Sueldo</th>
                <th>Telefono</th>
                <th>Puesto</th>
                <th>Fecha_nac</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($empleados as $empleado)
            <tr>
                <td>{{ $empleado->id }}</td>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->sueldo }}</td>
                <td>{{ $empleado->telefono }}</td>
                <td>{{ $empleado->puesto }}</td>
                <td>{{ $empleado->fecha_nac}}</td>
                <td>
                    <button onclick="window.location.href='/empleados/edit/{{ $empleado->id }}'">Editar</button>
        
                    <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
