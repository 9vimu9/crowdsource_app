<?php

namespace App\Http\Controllers\API;

use App\DTOs\QuestionInputDTO;
use App\Http\Requests\SaveQuestionsRequest;
use App\Services\QuestionService;
use Illuminate\Http\JsonResponse;
use Throwable;

class SaveQuestionsController extends CustomAPIBaseController
{
    private QuestionService $questionService;

    public function __construct(QuestionService $questionService)
    {
        parent::__construct();
        $this->questionService = $questionService;
    }


    public function saveQuestions(SaveQuestionsRequest $request): JsonResponse
    {
        try {
            foreach ($request->get("questions") as $question) {

                $this->questionService->store(new QuestionInputDTO(
                    question: $question["question"],
                    answer: $question["answer"],
                    paragraphID: $request->get("paragraph_id"),
                    userID: 2,
//                    userID: auth()->user()->id,
                ));

            }
            return $this->successfulResponse->response();
        } catch (Throwable $throwable) {
            report($throwable);
            return $this->errorResponse->response();
        }


    }
}
