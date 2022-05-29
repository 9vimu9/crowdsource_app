<?php

namespace App\DTOs;

use Spatie\DataTransferObject\DataTransferObject;

class QuestionInputDTO extends DataTransferObject
{
    public string $question;
    public string $answer;
    public int $userID;
    public int $paragraphID;

}
