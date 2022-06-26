<?php

namespace App\Http\Controllers\API;

use App\Services\ParagraphService;
use Illuminate\Http\JsonResponse;

class ParagraphController extends CustomAPIBaseController
{
    private ParagraphService $paragraphService;

    public function __construct(ParagraphService $paragraphService)
    {
        parent::__construct();
        $this->paragraphService = $paragraphService;
    }

    /**
     */
    public function show(int $id): JsonResponse
    {
        try {
            return $this->successfulResponse->data(
                $this->paragraphService
                    ->getParagraphByID($id)
                    ->toArray()
            )->response();

        } catch (\Throwable $throwable) {
            report($throwable);
            return $this->serverErrorResponse->response();
        }

    }

    public function newParagraph(): JsonResponse
    {
        try {
            return $this->successfulResponse->data(
                $this->paragraphService
                    ->getParagraphToCreateQuestions()
                    ->toArray()
            )->response();
        } catch (\Throwable $throwable) {
            report($throwable);
            return $this->serverErrorResponse->response();
        }

    }




}
