<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\{
    UserController,
    BathroomController,
    QueueController,
    ReservationController
};

// Rota de login para autenticação e geração do token
Route::post('/login', function (Request $request) {
    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['error' => 'Credenciais inválidas'], 401);
    }

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json(['token' => $token]);
});

// Rotas protegidas para `users`
Route::prefix('users')->middleware('auth:sanctum')->controller(UserController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

// Rotas protegidas para `bathrooms`
Route::prefix('bathrooms')->middleware('auth:sanctum')->controller(BathroomController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

// Rotas protegidas para `queues`
Route::prefix('queues')->middleware('auth:sanctum')->controller(QueueController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

// Rotas protegidas para `reservations`
Route::prefix('reservations')->middleware('auth:sanctum')->controller(ReservationController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/{id}', 'show');
    Route::post('/', 'store');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

// Rota de teste para verificar se a API está rodando
Route::get('/', function () {
    return response()->json(['message' => 'API is running']);
});
