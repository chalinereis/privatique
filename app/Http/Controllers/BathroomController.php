<?php

namespace App\Http\Controllers;

use App\Models\Bathroom; // Certifique-se de que o modelo Bathroom está criado
use Illuminate\Http\Request;

class BathroomController extends Controller
{
    // Método para listar todos os banheiros
    public function index()
    {
        $bathrooms = Bathroom::all(); // Recupera todos os banheiros
        return response()->json($bathrooms);
    }

    // Método para mostrar um banheiro específico
    public function show($id)
    {
        $bathroom = Bathroom::find($id);
        
        if (!$bathroom) {
            return response()->json(['message' => 'Banheiro não encontrado'], 404);
        }

        return response()->json($bathroom);
    }

    // Método para criar um novo banheiro
    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|string|max:255',
            // Adicione outras validações conforme necessário
        ]);

        $bathroom = Bathroom::create($request->all());
        return response()->json($bathroom, 201);
    }

    // Método para atualizar um banheiro existente
    public function update(Request $request, $id)
    {
        $bathroom = Bathroom::find($id);
        
        if (!$bathroom) {
            return response()->json(['message' => 'Banheiro não encontrado'], 404);
        }

        $bathroom->update($request->all());
        return response()->json($bathroom);
    }

    // Método para deletar um banheiro
    public function destroy($id)
    {
        $bathroom = Bathroom::find($id);
        
        if (!$bathroom) {
            return response()->json(['message' => 'Banheiro não encontrado'], 404);
        }

        $bathroom->delete();
        return response()->json(['message' => 'Banheiro deletado com sucesso']);
    }
}
