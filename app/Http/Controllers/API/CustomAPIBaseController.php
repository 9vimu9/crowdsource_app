<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Supporters\Responses\ErrorResponse;
use App\Supporters\Responses\ServerErrorResponse;
use App\Supporters\Responses\SuccessfulResponse;

class CustomAPIBaseController extends Controller
{
    protected SuccessfulResponse $successfulResponse;
    protected ErrorResponse $errorResponse;
    protected ServerErrorResponse $serverErrorResponse;

    public function __construct()
    {
        $this->errorResponse = new ErrorResponse();
        $this->successfulResponse = new SuccessfulResponse();
        $this->serverErrorResponse = new ServerErrorResponse();
    }

}
