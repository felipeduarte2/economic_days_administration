@extends('layouts.plantilla')
@section('title','Registro')
@section('content')
    <section>
        <h1>Nuevo Usuario</h1>
        <form action="" method="POST">
            <label for="codigo_empleado">C&oacute;digo de empleado</label>
            <input type="text" id="codigo_empleado" name="codigo_empleado" class="controls">

            <br>
            <br>

            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="controls">

            <br>
            <br>
            
            <label for="Departamento">Departamento</label>
            <select id="Departamento" name="Departamento" class="controls">
                <option value="1">Departamento 1</option>
                <option value="2">Departamento 2</option>
                <option value="3">Departamento 3</option>
            </select>

            <br>
            <br>

            <label for="apellido_paterno">Apellido paterno</label>
            <input type="text" id="apellido_paterno" name="apellido_paterno" class="controls">

            <br>
            <br>

            <label for="apellido_materno">Apellido materno</label>
            <input type="text" id="apellido_materno" name="apellido_materno" class="controls">

            <br>
            <br>

            <label for="contrasena">Contrase&ntilde;a:</label>
            <input type="password" id="contrasena" name="contrasena" class="controls">

            <br>
            <br>

            <label for="puesto">Puesto</label>
            <select id="puesto" name="puesto" class="controls">
                <option value="1">Puesto 1</option>
                <option value="2">Puesto 2</option>
                <option value="3">Puesto 3</option>
            </select>

            <br>
            <br>

            <!-- <button type="submit" value="registrar" class="botons">Registrar</button> -->
            <input type="submit" value="Registrar" name="Registrar" class="botons"/>

        </form>
    </section>
@endsection()