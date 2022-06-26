<?php

namespace App\Supporters\Responses;

use Illuminate\Http\JsonResponse;

class SuccessfulResponse extends Response
{
    private array $dataArray=[];

    public function data(array $data): self
    {
        $this->dataArray = $data;
        return $this;
    }


    public function response(): JsonResponse
    {
        return response()->json([
            'data' => $this->dataArray,
            'is_error' => 0,
        ]);
    }
}
