<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Supporters\Responses\ErrorResponse;
use App\Supporters\Responses\Response;
use App\Supporters\Responses\ServerErrorResponse;
use App\Supporters\Responses\SuccessfulResponse;

class CustomAPIBaseController extends Controller
{
    protected SuccessfulResponse $successfulResponse;
    protected ErrorResponse $errorResponse;
    protected ServerErrorResponse $serverErrorResponse;

    public function successful(): SuccessfulResponse
    {
        return new SuccessfulResponse();
    }

    public function error(): ErrorResponse
    {
        return new ErrorResponse();
    }

    public function serverError(): ServerErrorResponse
    {
        return new ServerErrorResponse();
    }


}
