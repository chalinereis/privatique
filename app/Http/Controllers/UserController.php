<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    // Listar todos os usuários
    public function index()
    {
        return User::all();
    }

    // Criar um novo usuário
    public function store(Request $request)
    {
        // Validar os dados de entrada
        $request->validate([
            'nickname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Criar o usuário
        $user = User::create([
            'nickname' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json($user, 201);
    }

    // Exibir um usuário específico
    public function show($id)
    {
        return User::findOrFail($id);
    }

    // Atualizar um usuário existente
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validar os dados de entrada
        $request->validate([
            'nickname' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|string|min:8|confirmed',
        ]);

        // Atualizar o usuário
        $user->update($request->only('nickname', 'email', 'password'));

        return response()->json($user, 200);
    }

    // Deletar um usuário
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(null, 204);
    }
}
