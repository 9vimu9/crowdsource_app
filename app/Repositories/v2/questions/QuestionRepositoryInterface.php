<?php

namespace App\Repositories\v2\questions;

use App\DTOs\v2\StoreQuestionDTO;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

interface QuestionRepositoryInterface
{
    public function store(StoreQuestionDTO $questionDTO):Builder|Model;


}
