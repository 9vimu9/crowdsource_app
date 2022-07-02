<?php

namespace App\Repositories\v2\questions;

use App\DTOs\v2\StoreQuestionDTO;
use App\Exceptions\app\QuestionStoreException;
use App\Models\Paragraph;
use App\Models\Question;
use App\Repositories\v2\RepositoryModels;
use \Illuminate\Database\Eloquent\Builder;
use \Illuminate\Database\Eloquent\Model;

class MySqlQuestionRepository implements QuestionRepositoryInterface
{
    use RepositoryModels;
    protected string $modelClass = Question::class;

    /**
     * @throws QuestionStoreException
     */
    public function store(StoreQuestionDTO $questionDTO): Builder|Model
    {
        $question = $this->modelInstance()->newQuery()->create([
            "question" => $questionDTO->question,
            "answer" => $questionDTO->answer,
            "user_id" => $questionDTO->userID,
            "paragraph_id" => $questionDTO->paragraphID,
        ]);

        if (!$question) {
            throw new QuestionStoreException();
        }

        return $question;
    }
}
