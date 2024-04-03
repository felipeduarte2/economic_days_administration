@extends('layouts.plantilla')
@section('title','solicitud')
@section('content')
    <section>
        <h1>Vista para una nueva solicitud</h1>
        <form action="" method="POST">
            <label for="codigo_de_empleado" class="form-label">C&oacute;digo de empleado</label>
            <input class="controls form-control" type="text" name="codigo_de_empleado" id="codigo_de_empleado" value = "0000" readonly>

            <br>
            <br>

            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" id="nombre" name="nombre" class="controls form-control" value = "xxxxxxxxx" readonly>

            <br>
            <br>

            <label for="puesto" class="form-label">Puesto</label>
            <select id="puesto" name="puesto" class="controls form-control" readonly>
                <option value="1">opci&oacute;n 1</option>
            </select>

            <br>
            <br>

            <label for="fecha_actual" class="form-label">Fecha de Solicitud</label> 
            <input type="date" name="fecha_actual" id="fecha_actual" class="controls form-control" value="00/00/0000" readonly>

            <br>
            <br>

            <label for="fecha_solicitado" class="form-label">Fecha solicitada</label> 
            <input type="date" name="fecha_solicitado" id="fecha_solicitado" class="controls form-control" require>

            <br>
            <br>

            <label for="observaciones" class="form-label">Observaciones</label>
            <textarea name="observaciones" id="observaciones" cols="30" rows="2" class="controls form-control"></textarea>

            <br>
            <br>

            <input class="botons-btn-btn-primary" type="submit" name="enviar_solicitud"  value="Enviar">
        </form>
    </section>
@endsection()