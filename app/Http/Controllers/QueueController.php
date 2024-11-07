<?php

namespace App\Http\Controllers;

use App\Models\Queue; // Certifique-se de ter um modelo Queue
use Illuminate\Http\Request;

class QueueController extends Controller
{
    // Método para listar as filas
    public function index()
    {
        // Retornar todas as filas
        return Queue::all();
    }

    // Método para adicionar um usuário à fila
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'bathroom_id' => 'required|exists:bathrooms,id',
        ]);

        // Criar nova entrada na fila
        $queue = Queue::create([
            'user_id' => $request->user_id,
            'bathroom_id' => $request->bathroom_id,
            'position' => Queue::where('bathroom_id', $request->bathroom_id)->count() + 1, // Exemplo simples para determinar posição
            'estimated_wait_time' => 0, // Você pode calcular isso de acordo com suas regras de negócios
        ]);

        return response()->json($queue, 201);
    }

    // Método para mostrar uma entrada específica na fila
    public function show($id)
    {
        $queue = Queue::findOrFail($id);
        return response()->json($queue);
    }

    // Método para remover um usuário da fila
    public function destroy($id)
    {
        $queue = Queue::findOrFail($id);
        $queue->delete();

        return response()->json(null, 204);
    }
}
