<?php

namespace App\Services\v2;

use App\Repositories\v2\paragraphs\ParagraphRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ParagraphService
{
    protected ParagraphRepositoryInterface $paragraphRepository;

    public function __construct(ParagraphRepositoryInterface $paragraphRepository)
    {
        $this->paragraphRepository = $paragraphRepository;
    }

    public function randomFreshParagraph(): Model|Builder
    {
        return $this->paragraphRepository->freshParagraph(true);
    }

    public function freshParagraph(): Model|Builder
    {
        return $this->paragraphRepository->freshParagraph();
    }

}
