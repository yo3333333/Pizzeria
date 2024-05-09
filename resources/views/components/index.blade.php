<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Archivos de Empleados</title>
</head>
<body>
    <h1>Lista de Archivos de Empleados</h1>

    @foreach($empleados as $empleado)
        <div style="margin-bottom: 20px;">
            <h2>{{ $empleado->nombre }}</h2>
            @if($empleado->avatar)
                <img src="{{ asset(Storage::url($empleado->avatar)) }}" width="100" alt="Avatar de {{ $empleado->nombre }}">
            @else
                <p>No hay avatar disponible para este empleado.</p>
            @endif
            <p>Nombre del archivo: {{ basename($empleado->avatar) }}</p>
            <a href="{{ asset(Storage::url($empleado->avatar)) }}" download>Descargar</a>
        </div>
    @endforeach

    @if($empleados->isEmpty())
        <p>No hay empleados con archivos disponibles.</p>
    @endif
</body>
</html>
