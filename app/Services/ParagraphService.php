<?php

namespace App\Services;

use App\DTOs\ParagraphDTO;
use App\Models\Paragraph;
use App\Repositories\ParagraphRepository;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ParagraphService
{
    private ParagraphRepository $paragraphRepository;

    public function __construct(ParagraphRepository $paragraphRepository)
    {
        $this->paragraphRepository = $paragraphRepository;
    }

    /**
     * @throws UnknownProperties
     */
    public function getParagraphToCreateQuestions(): ParagraphDTO
    {
       return $this->paragraphRepository->paragraphToCreateQuestions();
    }

    /**
     * @throws UnknownProperties
     */
    public function getParagraphByID(int $id): ParagraphDTO
    {
        return $this->paragraphRepository->getDTO($id);
    }

}
