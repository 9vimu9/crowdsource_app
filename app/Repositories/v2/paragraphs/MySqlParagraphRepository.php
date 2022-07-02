<?php

namespace App\Repositories\v2\paragraphs;

use App\Models\Paragraph;
use App\Repositories\v2\RepositoryModels;
use \Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Builder;

class MySqlParagraphRepository implements ParagraphRepositoryInterface
{
    use RepositoryModels;
    protected string $modelClass = Paragraph::class;

    public function freshParagraph(bool $random=false): Model|Builder
    {
        $paragraph = $this->modelInstance()->newQuery()
            ->where("approved",constantValue("paragraph_approving.approved"))
            ->where("no_more_questions",constantValue("questions_from_paragraph.more_to_ask"));

        if($random){
            $paragraph = $paragraph->inRandomOrder();
        }
        return $paragraph->firstOrFail();
    }



}
