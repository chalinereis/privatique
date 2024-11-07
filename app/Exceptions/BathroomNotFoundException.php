<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class BathroomNotFoundException extends Exception
{
    protected $message = 'Bathroom not found';
    protected $code = Response::HTTP_NOT_FOUND;

    public function render()
    {
        return response()->json([
            'error' => $this->getMessage()
        ], $this->getCode());
    }
}
