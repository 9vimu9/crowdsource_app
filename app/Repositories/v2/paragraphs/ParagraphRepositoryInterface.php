<?php

namespace App\Repositories\v2\paragraphs;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface ParagraphRepositoryInterface
{
    public function freshParagraph(bool $random=false): Model|Builder;

}
