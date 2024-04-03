@extends('layouts.plantilla')
@section('title','Estado Solicitud')
@section('content')
    <section>
        <h1>Estado de la solicitud</h1>
        <form action="" method="POST">
            <label for="codigo_de_empleado" class="form-label">C&oacute;digo de empleado</label>
            <input class="controls form-control" type="text" name="codigo_de_empleado" id="codigo_de_empleado" placeholder="Código de empleado">

            <br>
            <br>

            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="controls form-control">

            <br>
            <br>

            <label for="fecha-solicitado" class="form-label">Fecha solicitada</label> 
            <input type="date" name="fecha-solicitado" id="fecha-solicitado" class="controls form-control">

            <br>
            <br>

            <label for="Estado" class="form-label">Estado</label>
            <input type="text" id="Estado" name="Estado" class="controls form-control">
        </form>
    </section>
@endsection()