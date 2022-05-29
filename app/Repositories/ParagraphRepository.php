<?php

namespace App\Repositories;

use App\DTOs\ParagraphDTO;
use App\Models\Paragraph;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ParagraphRepository
{
    private Paragraph $paragraph;

    public function __construct(Paragraph $paragraph)
    {
        $this->paragraph = $paragraph;
    }

    /**
     * @throws UnknownProperties
     */
    public function getDTO(int $id): ParagraphDTO
    {
        $paragraph = $this->paragraph->newQuery()->findOrFail($id);
        return new ParagraphDTO(
            id: $paragraph->id,
            paragraph: $paragraph->paragraph,
            order: $paragraph->order,
            approved: $paragraph->approved,
            noMoreQuestions: $paragraph->no_more_questions,
        );


    }

}

