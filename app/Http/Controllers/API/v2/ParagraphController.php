<?php

namespace App\Http\Controllers\API\v2;

use App\Http\Controllers\API\CustomAPIBaseController;
use App\Http\Resources\ParagraphResource;
use App\Repositories\v2\paragraphs\ParagraphRepositoryInterface;
use App\Services\v2\ParagraphService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ParagraphController extends CustomAPIBaseController
{
    protected ParagraphRepositoryInterface $paragraphRepository;
    protected ParagraphService $paragraphService;


    public function __construct(ParagraphRepositoryInterface $paragraphRepository,ParagraphService $paragraphService)
    {
        $this->paragraphRepository = $paragraphRepository;
        $this->paragraphService = $paragraphService;
    }

    /**
     * @return ParagraphResource|JsonResponse
     */
    public function newParagraph(): ParagraphResource|JsonResponse
    {
        try {
            return new ParagraphResource($this->paragraphService->randomFreshParagraph());
        } catch (\Throwable $throwable) {
            report($throwable);
            return $this->serverError()->response();
        }

    }


}
