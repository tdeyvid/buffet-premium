<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = User::latest()->paginate(10);

        return view(
            'admin.usuarios.index',
            compact('usuarios')
        );
    }

    public function create()
    {
        return view(
            'admin.usuarios.create'
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'role'=>'required'

        ]);

        User::create([

            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make(
                $request->password
            ),
            'role'=>$request->role

        ]);

        return redirect()
        ->route('admin.usuarios.index')
        ->with(
            'success',
            'Usuário criado'
        );
    }

    public function edit(User $usuario)
    {
        return view(
            'admin.usuarios.edit',
            compact('usuario')
        );
    }

    public function update(
        Request $request,
        User $usuario
    )
    {

        $request->validate([

            'name'=>'required',
            'email'=>'required|email',
            'role'=>'required'

        ]);

        $usuario->update([

            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role

        ]);

        return redirect()
        ->route('admin.usuarios.index')
        ->with(
            'success',
            'Atualizado'
        );
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();

        return back()
        ->with(
            'success',
            'Usuário removido'
        );
    }
}