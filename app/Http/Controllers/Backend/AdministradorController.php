<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Departamento;
use App\Models\Periodo;
use App\Models\Puesto;
use App\Models\User;
use App\Rules\CordinadorRule;
use App\Rules\DirectorRule;
use App\Rules\PeriodosRule;
use App\Rules\SubDirectorRule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Closure;

class AdministradorController extends Controller
{
    //
    public function dashboard(): View
    {
        $users = User::where('id', '!=', auth()->user()->id)->latest()->paginate(10);
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

        return redirect()->route('administrador.dashboard');
    }  
    

    public function edit(User $user): View
    {
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

        return redirect()->route('administrador.dashboard');
    }


    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('administrador.dashboard');
    }

    // fuencion para una vista Periodos
    public function periodos(): View
    {
        $periodos = Periodo::latest()->paginate(10);
        return view('administrador.periodos', compact('periodos'));
    }


    // funcion para una vista para crear un nuevo Periodo
    public function createPeriodo(): View
    {
        return view('administrador.create_periodo');
    }

    // funcion para crear un nuevo Periodo
    public function storePeriodo(Request $request): RedirectResponse
    {
        $request->validate([
            'descripcion' => ['required', 'string', 'max:20'],
            'fecha_inicio' => [
                'required', 
                'date',
                'before:fecha_fin',
                new PeriodosRule
            ],
            'fecha_fin' => [
                'required', 
                'date', 
                'after:fecha_inicio',
                new PeriodosRule
            ],
        ]);
        Periodo::create($request->all());

        return redirect()->route('administrador.periodos');
    }


}
