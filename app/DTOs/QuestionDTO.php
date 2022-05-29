<?php

namespace App\DTOs;

use Spatie\DataTransferObject\DataTransferObject;

class QuestionDTO extends DataTransferObject
{
    public int $id;
    public string $question;
    public string $answer;
    public int $approved;
    public int $userID;
    public int $paragraphID;

}
