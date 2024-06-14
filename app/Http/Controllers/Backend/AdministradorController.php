<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use App\Models\Puesto;
use App\Models\User;
use App\Rules\CordinadorRule;
use App\Rules\DirectorRule;
use App\Rules\SubDirectorRule;
// use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AdministradorController extends Controller
{
    //
    public function dashboard(){
        // user en orden del mas reciente paginado de 5
        $users = User::orderBy('created_at', 'desc')->paginate(5);
        // $users = User::orderBy('created_at', 'desc')->get();
        return view('administrador.dashboard', compact('users'));
    }

    public function create(): View
    {
        $puestos = Puesto::all();
        $departamentos = Departamento::all();
        return view('administrador.register', compact('puestos', 'departamentos'));
    }

    // funcion para crear un nuevo usuario
    public function store(Request $request): RedirectResponse
    {
         // Validamos el formulario 
        $request->validate([
            'Codigo_empleado' => ['required', 'string', 'max:10', 'unique:'.User::class],
            'Nombre' => ['required', 'string', 'max:255'],
            'ApellidoP' => ['required', 'string', 'max:255'],
            'ApellidoM' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'IdPuesto' => ['required', new DirectorRule, new SubDirectorRule],
            'IdDepartamento' => ['required', new CordinadorRule],
        ]);

        $user = User::create([
            'Codigo_empleado' => $request->input('Codigo_empleado'),
            'Nombre' => $request->input('Nombre'),
            'ApellidoP' => $request->input('ApellidoP'),
            'ApellidoM' => $request->input('ApellidoM'),
            'email' => $request->input('email'),
            'status' => 'Activo',
            'password' => Hash::make('000000'),
            'IdDepartamento' => $request->IdDepartamento,
            'IdPuesto' => $request->IdPuesto,
        ]);

        $user->save();

        $puestos = Puesto::all();
        $departamentos = Departamento::all();
        return redirect(route('administrador.dashboard', compact('puestos', 'departamentos'), absolute: false));    
    }  
    

    public function edit(User $user){
        $puestos = Puesto::all();
        $departamentos = Departamento::all();
        return view('administrador.edit', compact('puestos', 'departamentos', 'user'));
    }

    public function update(User $user, Request $request) : RedirectResponse
    {

        $request->validate([
            'Codigo_empleado' => ['required', 'string', 'max:10', Rule::unique('users')->ignore($user->id)],
            'Nombre' => ['required', 'string', 'max:255'],
            'ApellidoP' => ['required', 'string', 'max:255'],
            'ApellidoM' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'IdPuesto' => ['required', new DirectorRule, new SubDirectorRule],
            'IdDepartamento' => ['required', new CordinadorRule],
        ]);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $user->update($request->all());
        $puestos = Puesto::all();
        $departamentos = Departamento::all();
        return redirect(route('administrador.dashboard', compact('puestos', 'departamentos'), absolute: false));
    }

}
