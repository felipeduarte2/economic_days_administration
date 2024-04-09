@extends('layouts.plantilla')

@section('title','login')

@section('content')

    <section>
        <h1>Iniciar sesi&oacute;n</h1>
        <form action="" method="POST">
            <label for="codigo_de_empleado">C&oacute;digo de empleado</label>
            <input class="controls" type="text" name="codigo_de_empleado" id="codigo_de_empleado" placeholder="Código de empleado">

            
            <br>
            <br>

            <label for="contrasena">Contrase&ntilde;a: </label> 
            <input class="controls" type="password" name="contrasena" id="contrasena" placeholder="Contraseña">

            <br>
            <br>

            <input class="botons" type="submit" value="Iniciar Sesión" name="iniciar_sesion">

            <p>¿Haz olvidado tu contraseña?</p>

            {{-- <p><a href="registro.php">Registrar</a></p> --}}
        </form>
    </section>
@endsection()