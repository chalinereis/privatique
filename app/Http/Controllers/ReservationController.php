<?php

namespace App\Http\Controllers;

use App\Models\Reservation; // Certifique-se de que o modelo Reservation existe
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Método para listar todas as reservas
    public function index()
    {
        $reservations = Reservation::all();
        return response()->json($reservations);
    }

    // Método para criar uma nova reserva
    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'bathroom_id' => 'required|exists:bathrooms,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        // Criação da nova reserva
        $reservation = Reservation::create($validatedData);

        return response()->json($reservation, 201); // Retorna a reserva criada com status 201
    }
}
