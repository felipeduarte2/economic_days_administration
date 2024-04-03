@extends('layouts.plantilla')
@section('title','vista solicitud')
@section('content')
    <section>
        <h1>Solicitud</h1>
        <form action="" method="POST">
            <label for="codigo_de_empleado" class="form-label">C&oacute;digo de empleado</label>
            <input class="controls form-control" type="text" name="codigo_de_empleado" id="codigo_de_empleado" value = "0000" readonly>

            <br>
            <br>

            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="controls form-control" value = "aaaa" readonly>

            <br>
            <br>

            <label for="fecha_solicitado" class="form-label">Fecha solicitada</label> 
            <input type="date" name="fecha_solicitado" id="fecha_solicitado" class="controls form-control" value = "" readonly>

            <br>
            <br>

            <label for="contrasena" class="form-label">Contrase&ntilde;a</label>
            <input class="controls form-control" type="password" name="contrasena" id="contrasena" placeholder="Contraseña">

            <br>
            <br>

            <input class="btn btn-primary" type="submit" value="Aprobar">
            <input class="btn btn-primary" type="submit" value="Rechazar">
        </form>
    </section>
@endsection()