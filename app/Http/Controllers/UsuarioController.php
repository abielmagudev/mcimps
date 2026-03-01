<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\User\UserTypeEnum;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        return view('usuarios.index', [
            'usuarios' => User::all()->sortByDesc('id'),
        ]);
    }

    public function create()
    {
        return view('usuarios.create', [
            'user' => new User,
            'types' => UserTypeEnum::cases(),
        ]);
    }

    public function store(StoreUserRequest $request)
    {
        if( ! $user = User::create($request->validated()) ) {
            return back()->withErrors($user->errors())->with('error', 'Error al crear el usuario');
        }

        return redirect()->route('usuarios.index')->with('success', sprintf('Usuario "%s" creado con éxito', $user->name));
    }

    public function show(User $user)
    {
        return redirect()->route('usuarios.index');
    }

    public function edit(User $user)
    {
        return view('usuarios.edit', [
            'user' => $user,
            'types' => UserTypeEnum::cases(),
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        if( ! isset($validated['password']) ) {
            unset($validated['password'], $validated['confirm_password']);
        }

        if( ! $user->update($validated) ) {
            return back()->withErrors($user->errors())->with('error', 'Error al actualizar el usuario');
        }

        return redirect()->route('usuarios.edit', $user)->with('success', sprintf('Usuario "%s" actualizado con éxito', $user->name));
    }

    public function destroy(User $user)
    {
        if( ! $user->delete() ) {
            return back()->withErrors($user->errors())->with('error', 'Error al eliminar el usuario');
        }

        return redirect()->route('usuarios.index')->with('success', sprintf('Usuario "%s" eliminado con éxito', $user->name));
    }

    public function confirmarEliminacion(User $user)
    {
        return view('usuarios.confirmar-eliminacion', [
            'user' => $user,
        ]);
    }
}
