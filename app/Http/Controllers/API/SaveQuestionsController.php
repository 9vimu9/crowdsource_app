<?php

namespace App\Http\Controllers\API;

use App\DTOs\QuestionInputDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveQuestionsRequest;
use App\Services\QuestionService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class SaveQuestionsController extends Controller
{
    private QuestionService $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    /**
     * @throws Throwable
     */
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
            return response()->json([]);
        } catch (Exception $exception) {
            return response()->json([$exception->getMessage(), $exception->getLine(), $exception->getFile()]);
        }


    }
}
