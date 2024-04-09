@extends('layouts.plantilla')
@section('title','solicitud')
@section('content')
    <section>

        <div class="flex justify-center items-center h-screen bg-slate-500">

            <div class="w-96 p-6 shadow-mg rounded-md text-black bg-white">

                <div class="text-3xl font-bold mb-2 text-[#1e0e4b] text-center"><h1 class="text-[#2196f3]">Solicitud</h1></div>
                
                <div class="text-mm font-normal mb-4 text-center text-[#1e0e4b]">Ingreso sus datos de la solicitud</div>

                <form action="" method="POST" class="flex flex-col gap-3">

                    <div class="block relative">
                        <label class="block text-gray-600 cursor-text text-mm leading-[140%] font-normal mb-2" for="codigo_de_empleado">C&oacute;digo de empleado</label>
                        <input class="rounded border border-blue-500 text-mm w-full font-normal leading-[18px] text-black tracking-[0px] appearance-none block h-11 m-0 p-[11px] focus:ring-2 ring-offset-2  ring-blue-500 outline-0" type="text" name="codigo_de_empleado" id="codigo_de_empleado" placeholder="Código de empleado">
                    </div>

                    <div class="block relative">
                        <label for="nombre" class="block text-gray-600 cursor-text text-mm leading-[140%] font-normal mb-2">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="rounded border border-blue-500 text-mm w-full font-normal leading-[18px] text-black tracking-[0px] appearance-none block h-11 m-0 p-[11px] focus:ring-2 ring-offset-2  ring-blue-500 outline-0">
                    </div>

                    <div class="block relative">
                        <label for="puesto" class="block text-gray-600 cursor-text text-mm leading-[140%] font-normal mb-2" for="contrasena">Puesto</label>
                        <select id="puesto" name="puesto" class="rounded border border-blue-500 text-mm w-full font-normal leading-[18px] text-black tracking-[0px] appearance-none block h-11 m-0 p-[11px] focus:ring-2 ring-offset-2 ring-blue-500 outline-0">
                            <option value="1">Puesto 1</option>
                            <option value="2">Puesto 2</option>
                            <option value="3">Puesto 3</option>
                        </select>
                    </div>

                    <div class="block relative">
                        <label for="fecha_actual" class="block text-gray-600 cursor-text text-mm leading-[140%] font-normal mb-2">Fecha de Solicitud</label>
                        <input type="date" name="fecha_actual" id="fecha_actual" class="rounded border border-blue-500 text-mm w-full font-normal leading-[18px] text-black tracking-[0px] appearance-none block h-11 m-0 p-[11px] focus:ring-2 ring-offset-2  ring-blue-500 outline-0">
                    </div>
                    
                    <div class="block relative">
                        <label for="fecha_solicitado" class="block text-gray-600 cursor-text text-mm leading-[140%] font-normal mb-2">Fecha solicitada</label>
                        <input type="date" name="fecha_solicitado" id="fecha_solicitado" class="rounded border border-blue-500 text-mm w-full font-normal leading-[18px] text-black tracking-[0px] appearance-none block h-11 m-0 p-[11px] focus:ring-2 ring-offset-2  ring-blue-500 outline-0">
                    </div>

                    <div class="block relative">
                        <label for="observaciones" class="block text-gray-600 cursor-text text-mm leading-[140%] font-normal mb-2">Observaciones</label>
                        <textarea name="observaciones" id="observaciones" cols="30" rows="2" class="rounded border border-blue-500 text-mm w-full font-normal leading-[18px] text-black tracking-[0px] appearance-none block h-11 m-0 p-[11px] focus:ring-2 ring-offset-2  ring-blue-500 outline-0"></textarea>
                    </div>

                    <div class="grid grid-cols-2 items-center">
                        <button type="submit" class="bg-[#2196f3] w-max m-auto px-6 py-2 rounded text-white text-mm font-normal">Enviar</button>
                        <button type="reset" class="bg-[#2196f3] w-max m-auto px-6 py-2 rounded text-white text-mm font-normal">Cancelar</button>
                    </div>
                
                </form>


            </div>

        </div>

    </section>
@endsection()