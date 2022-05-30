<?php

namespace App\DTOs;

use Illuminate\Database\Eloquent\Model;
use Spatie\DataTransferObject\DataTransferObject;

class ParagraphDTO extends DataTransferObject
{
    public int $id;
    public string $paragraph;
    public int $order;
    public int $articleID;
    public int $approved;
    public int $noMoreQuestions;


}


