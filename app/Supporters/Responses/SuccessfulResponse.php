<?php

namespace App\Supporters\Responses;

use Illuminate\Http\JsonResponse;

class SuccessfulResponse extends Response
{
    private ?array $dataArray=null;

    public function data(array $data): self
    {
        $this->dataArray = $data;
        return $this;
    }


    public function response(): JsonResponse
    {
        return response()->json([
            'data' => is_null($this->dataArray) ? [] : $this->dataArray
        ]);
    }
}
