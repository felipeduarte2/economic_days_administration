@extends('layouts.plantilla')

@section('title','login')

@section('content')

    <section>
        <div class="flex justify-center items-center h-screen bg-slate-500">

            <div class="w-96 p-6 shadow-mg rounded-md text-black bg-white">

                <div class="text-3xl font-bold mb-2 text-[#1e0e4b] text-center"><h1 class="text-[#7747ff]">¡Bienvenido!</h1></div>
                
                <div class="text-mm font-normal mb-4 text-center text-[#1e0e4b]">Ingrese a su cuenta</div>

                <form action="" method="POST" class="flex flex-col gap-3">

                    <div class="block relative">
                        <label class="block text-gray-600 cursor-text text-mm leading-[140%] font-normal mb-2" for="codigo_de_empleado">C&oacute;digo de empleado</label>
                        <input class="rounded border border-blue-500 text-mm w-full font-normal leading-[18px] text-black tracking-[0px] appearance-none block h-11 m-0 p-[11px] focus:ring-2 ring-offset-2  ring-blue-500 outline-0" type="text" name="codigo_de_empleado" id="codigo_de_empleado" placeholder="Código de empleado">
                    </div>

                    <div class="block relative">
                        <label class="block text-gray-600 cursor-text text-mm leading-[140%] font-normal mb-2" for="contrasena">Contrase&ntilde;a</label> 
                        <input class="rounded border border-blue-500 text-mm w-full font-normal leading-[18px] text-black tracking-[0px] appearance-none block h-11 m-0 p-[11px] focus:ring-2 ring-offset-2 ring-blue-500 outline-0" type="password" name="contrasena" id="contrasena" placeholder="Contraseña">
                    </div>

                    <div>
                        <a class="text-mm text-[#2196f3]" href="#">¿Olvidaste tu contraseña?
                        </a>
                    </div>

                    <button type="submit" class="bg-[#2196f3] w-max m-auto px-6 py-2 rounded text-white text-mm font-normal">Ingresar</button>
                
                </form>

                <div class="text-mm text-center mt-[1.6rem]">¿Aún no tienes una cuenta? <a class="text-mm text-[#2196f3]" href="#">¡Registrate!</a></div>

            </div>

        </div>

    </section>
@endsection()