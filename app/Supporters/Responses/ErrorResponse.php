<?php

namespace App\Supporters\Responses;

use Illuminate\Http\JsonResponse;

class ErrorResponse extends Response
{
    private ?array $dataArray = null;
    private string $customMessage = "";


    public function data(array $data): self
    {
        $this->dataArray = $data;
        return $this;
    }

    public function customMessage(string $customMessage): self
    {
        $this->customMessage = $customMessage;
        return $this;
    }


    public function response(): JsonResponse
    {
        return response()->json([
            'data' => is_null($this->dataArray) ? [] : $this->dataArray,
            'message' => $this->customMessage,
            'is_error' => 1,
        ]);
    }
}
