<?php

namespace App\Repositories;

use App\DTOs\QuestionDTO;
use App\DTOs\QuestionInputDTO;
use App\Exceptions\app\QuestionStoreException;
use App\Models\Question;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Throwable;

class QuestionRepository
{
    private Question $question;

    public function __construct(Question $question)
    {
        $this->question = $question;
    }

    /**
     * @throws QuestionStoreException|UnknownProperties
     * @throws Throwable
     */
    public function store(QuestionInputDTO $data): QuestionDTO
    {
        $question = $this->question->newQuery()->create([
            "question" => $data->question,
            "answer" => $data->answer,
            "user_id" => $data->userID,
            "paragraph_id" => $data->paragraphID,
        ]);

        if (!$question) {
            throw new QuestionStoreException();
        }

        return $this->getDTO($question->id);

    }

    /**
     * @throws UnknownProperties
     */
    public function getDTO(int $id): QuestionDTO
    {
        $question = $this->question->newQuery()->findOrFail($id);
        return new QuestionDTO(
            id: $question->id,
            question: $question->question,
            answer: $question->answer,
            approved: $question->approved,
            userID: $question->user_id,
            paragraphID: $question->paragraph_id,
        );

    }

}
