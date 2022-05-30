<?php

namespace App\Http\Controllers\API;

use App\DTOs\QuestionInputDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveQuestionsRequest;
use App\Services\QuestionService;
use App\Supporters\Responses\ServerErrorResponse;
use App\Supporters\Responses\SuccessfulResponse;
use Illuminate\Http\JsonResponse;
use Throwable;

class SaveQuestionsController extends Controller
{
    private QuestionService $questionService;
    private SuccessfulResponse $successfulResponse;
    private ServerErrorResponse $errorResponse;

    public function __construct(
        QuestionService $questionService,
        SuccessfulResponse $successfulResponse,
        ServerErrorResponse $errorResponse
    )
    {
        $this->questionService = $questionService;
        $this->successfulResponse = $successfulResponse;
        $this->errorResponse = $errorResponse;
    }


    public function saveQuestions(SaveQuestionsRequest $request): JsonResponse
    {
        try {
            foreach ($request->get("questions") as $question) {

                $this->questionService->store(new QuestionInputDTO(
                    question: $question["question"],
                    answer: $question["answer"],
                    paragraphID: $request->get("paragraph_id"),
                    userID: 1,
                ));

            }
            return $this->successfulResponse->response();
        } catch (Throwable $throwable) {
            report($throwable);
            return $this->errorResponse->response();
        }


    }
}
