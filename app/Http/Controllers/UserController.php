<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\UserNotFoundException;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    // Listar todos os usuários
    public function index()
    {
        return response()->json(User::all(), 200);
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

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Usuário criado com sucesso.',
            'user' => $user,
            'token' => $token,
        ], 201);
    }

    // Exibir um usuário específico
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            throw new UserNotFoundException();
        }

        return response()->json($user, 200);
    }

    // Atualizar um usuário existente
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            throw new UserNotFoundException();
        }

        // Validar os dados de entrada
        $request->validate([
            'nickname' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|required|string|min:8|confirmed',
        ]);

        // Atualizar o usuário
        $data = $request->only('nickname', 'email');

        // Atualizar a senha se fornecida
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return response()->json([
            'message' => 'Usuário atualizado com sucesso.',
            'user' => $user,
        ], 200);
    }

    // Deletar um usuário
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            throw new UserNotFoundException();
        }

        $user->delete();

        return response()->json([
            'message' => 'Usuário deletado com sucesso.'
        ], 204);
    }
}
