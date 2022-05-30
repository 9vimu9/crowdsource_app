<?php

namespace App\Supporters\Responses;

use Illuminate\Http\JsonResponse;

class ServerErrorResponse extends Response
{
    private ?string $customMessage=null;

    public function customMessage(string $customMessage): self
    {
        $this->customMessage = $customMessage;
        return $this;
    }


    public function response(): JsonResponse
    {
        return response()
            ->json([
                'message' => $this->customMessage ?? constantValue("server_error_message")
            ],
                500);
    }
}
