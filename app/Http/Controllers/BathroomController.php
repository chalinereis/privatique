<?php

namespace App\Http\Controllers;

use App\Models\Bathroom;
use Illuminate\Http\Request;
use App\Exceptions\BathroomNotFoundException;

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
            throw new BathroomNotFoundException();
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
            throw new BathroomNotFoundException();
        }

        $bathroom->update($request->all());
        return response()->json($bathroom);
    }

    // Método para deletar um banheiro
    public function destroy($id)
    {
        $bathroom = Bathroom::find($id);
        
        if (!$bathroom) {
            throw new BathroomNotFoundException();
        }

        $bathroom->delete();
        return response()->json(['message' => 'Banheiro deletado com sucesso'], 200);
    }
}
