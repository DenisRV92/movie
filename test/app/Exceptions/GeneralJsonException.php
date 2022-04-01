<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;

class GeneralJsonException extends Exception
{
    //
    public function render()
    {
        return new JsonResponse([
            'error' => $this->getMessage()
        ], 500);
    }
}
