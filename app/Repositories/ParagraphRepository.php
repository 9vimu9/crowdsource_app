<?php

namespace App\Repositories;

use App\DTOs\ParagraphDTO;
use App\Models\Paragraph;
use Illuminate\Database\Eloquent\Model;
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
        return $this->getDTOByModel($paragraph);
    }

    /**
     * @throws UnknownProperties
     */
    private function getDTOByModel(Model $model):ParagraphDTO
    {
        return new ParagraphDTO(
            id: $model->id,
            articleID: $model->article_id,
            paragraph: $model->paragraph,
            order: $model->order,
            approved: $model->approved,
            noMoreQuestions: $model->no_more_questions,
        );
    }

    /**
     * @throws UnknownProperties
     */
    public function paragraphToCreateQuestions(bool $random=true):ParagraphDTO
    {
        $paragraph = $this->paragraph->newQuery()
            ->where("approved",constantValue("paragraph_approving.approved"))
            ->where("no_more_questions",constantValue("questions_from_paragraph.more_to_ask"));

        if($random){
            $paragraph = $paragraph->inRandomOrder();
        }
        return $this->getDTOByModel($paragraph->firstOrFail());
    }

}

