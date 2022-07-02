<?php

namespace App\Http\Controllers\API\v2;

use App\DTOs\v2\StoreQuestionDTO;
use App\Http\Controllers\API\CustomAPIBaseController;
use App\Http\Requests\SaveQuestionsRequest;
use App\Repositories\v2\questions\QuestionRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Throwable;

class QuestionsController extends CustomAPIBaseController
{
    private QuestionRepositoryInterface $questionRepository;

    public function __construct(QuestionRepositoryInterface $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function store(SaveQuestionsRequest $request): JsonResponse
    {
        try {
            foreach ($request->get("questions") as $question) {

                $this->questionRepository->store((new StoreQuestionDTO(
                    question: $question["question"],
                    answer: $question["answer"],
                    paragraphID: $request->get("paragraph_id"),
                    userID: 1,
//                    userID: auth()->user()->id,
                )));

            }
            return $this->successful()->response();
        } catch (Throwable|UnknownProperties $throwable) {
            report($throwable);
            return $this->error()->response();
        }

    }
}
