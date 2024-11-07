<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use App\Exceptions\UserNotFoundException;
use App\Exceptions\BathroomNotFoundException;
use Symfony\Component\HttpFoundation\Response;

class Handler extends ExceptionHandler
{
    /**
     * Uma lista de exceções que não devem ser registradas.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        // Aqui você pode listar exceções que não deseja que sejam registradas em logs
    ];

    /**
     * Uma lista de inputs que nunca devem ser exibidos em logs.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Registra as callbacks de exceções para a aplicação.
     */
    public function register()
    {
        // Tratar UserNotFoundException
        $this->renderable(function (UserNotFoundException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        });

        // Tratar BathroomNotFoundException
        $this->renderable(function (BathroomNotFoundException $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], Response::HTTP_NOT_FOUND);
        });

        // Tratar outras exceções de forma genérica, caso necessário
        $this->renderable(function (Throwable $e) {
            return response()->json([
                'error' => 'Erro interno do servidor. Por favor, tente novamente mais tarde.'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        });
    }
}
