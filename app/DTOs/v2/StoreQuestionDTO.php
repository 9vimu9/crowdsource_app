<?php

namespace App\DTOs\v2;

use Spatie\DataTransferObject\DataTransferObject;

class StoreQuestionDTO extends DataTransferObject
{
    public string $question;
    public string $answer;
    public int $userID;
    public int $paragraphID;

}
