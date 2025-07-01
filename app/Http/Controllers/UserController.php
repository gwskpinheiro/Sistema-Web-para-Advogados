<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('advogado.users.index', compact('users'));
    }

    public function create()
    {
        return view('advogado.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('advogado.users.index')->with('success', 'Usuário criado com sucesso!');
    }

    public function show(User $user)
    {
        return view('advogado.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('advogado.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only(['nome', 'email', 'telefone']));

        return redirect()->route('advogado.users.index')->with('success', 'Usuário atualizado!');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('advogado.users.index')->with('success', 'Usuário excluído!');
    }
}
