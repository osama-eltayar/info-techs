<?php

namespace App\Traits;

trait ResponseHelpers
{
    protected function successResponse($data, $message = "action done successfully", $statusCode = 200)
    {
        return response(compact('data','message'),$statusCode);
    }
}
