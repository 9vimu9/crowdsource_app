<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Paragraph;
use App\Services\ParagraphService;
use App\Supporters\Responses\ServerErrorResponse;
use App\Supporters\Responses\SuccessfulResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ParagraphController extends Controller
{
    private ParagraphService $paragraphService;
    private SuccessfulResponse $successfulResponse;
    private ServerErrorResponse $serverErrorResponse;

    public function __construct(
        ParagraphService    $paragraphService,
        SuccessfulResponse  $successfulResponse,
        ServerErrorResponse $serverErrorResponse
    )
    {
        $this->successfulResponse = $successfulResponse;
        $this->paragraphService = $paragraphService;
        $this->serverErrorResponse = $serverErrorResponse;

    }

    /**
     */
    public function show(int $id): JsonResponse
    {
        try {
            $paragraph = $this->paragraphService->getParagraphByID($id);
            return $this->successfulResponse->data($paragraph->toArray())->response();
        } catch (\Throwable $throwable) {
            report($throwable);
            return $this->serverErrorResponse
//                ->customMessage($throwable->getMessage())
                ->response();
        }

    }

    public function newParagraph(): JsonResponse
    {
        try {
            $paragraph = $this->paragraphService->getParagraphToCreateQuestions();
            return $this->successfulResponse->data($paragraph->toArray())->response();
        } catch (\Throwable $throwable) {
            report($throwable);
            return $this->serverErrorResponse
//                ->customMessage($throwable->getMessage())
                ->response();
        }

    }




}
