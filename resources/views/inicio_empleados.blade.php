<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Empleados</title>
</head>
<body>

<h1>Empleados</h1>

<div>
    <button onclick="window.location.href='/empleados/crear'">Crear Empleado</button>
    <button onclick="window.location.href='/empleados/index'">Ver Empleados</button>
</div>
<br>
<form action="{{ url('/empleados/show') }}" method="GET"> 
            <div class="sub">
                <label for="id">Buscar empleado por ID:</label>
                <input class="cuadro-buscar" type="id" id="id" name="id" placeholder="12" autofocus="">
            </div><br><br>
            <label for="enviar"></label>
            <input type="submit" id="enviar" name="enviar">
            </form>


</body>
</html>