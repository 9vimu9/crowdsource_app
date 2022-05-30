<?php

namespace App\Supporters\Responses;

use Illuminate\Http\JsonResponse;

abstract class Response
{

    abstract public function response(): JsonResponse;

}
