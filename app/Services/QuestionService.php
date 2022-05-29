<?php

namespace App\Services;

use App\DTOs\QuestionDTO;
use App\DTOs\QuestionInputDTO;
use App\Exceptions\app\QuestionStoreException;
use App\Repositories\QuestionRepository;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Throwable;

class QuestionService
{
    private QuestionRepository $questionRepository;

    public function __construct(QuestionRepository $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    /**
     * @throws UnknownProperties
     * @throws QuestionStoreException|Throwable
     */
    public function store(QuestionInputDTO $data): QuestionDTO
    {
       return $this->questionRepository->store($data);
    }

}
