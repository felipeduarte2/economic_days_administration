<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Muestra el formulario de edición del perfil del usuario.
     *
     * @param Request $request La solicitud HTTP.
     * @return View La vista con el formulario de edición del perfil.
     */
    // Funcion para mostrar el formulario de edicion de perfil de usuario
    public function edit(Request $request): View
    {
        // Se obtiene el usuario actual de la solicitud HTTP y se lo pasa a la vista.
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }





    /**
     * Actualiza la información del perfil del usuario.
     *
     * @param ProfileUpdateRequest $request La solicitud HTTP con los datos del formulario de actualización.
     * @return RedirectResponse La respuesta de redirección a la vista de edición del perfil después de actualizar los datos.
     */
    // Función para procesar el formulario de edición de perfil de usuario
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Actualiza todos los campos del perfil excepto el código de empleado
        $request->user()->update($request->only(['Nombre', 'ApellidoP', 'ApellidoM', 'email',]));
        // $request->user()->fill($request->validated());

        // Si se ha modificado el email, se establece el campo email_verified_at en null
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Guarda los cambios en la base de datos
        $request->user()->save();

        // Redirecciona a la vista de edición del perfil con el mensaje 'profile-updated'
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }





    /**
     * Eliminar la cuenta del usuario.
     *
     * Esta función valida la contraseña del usuario y cambia su estado a 'Inactivo'.
     * Adicionalmente, vacía la sesión y regenera el token de la sesión.
     *
     * @param Request $request La solicitud HTTP.
     * @return RedirectResponse La respuesta de redirección.
     */
    // Función para eliminar la cuenta del usuario 
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        // $user->delete();
        // no borrar usuario solo poner $user->status en inactivo

        $user->status = 'Inactivo';

        $user->save();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
