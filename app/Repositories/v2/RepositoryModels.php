<?php

namespace App\Repositories\v2;

use Illuminate\Database\Eloquent\Model;

trait RepositoryModels
{
    public function modelInstance():Model
    {
        return new $this->modelClass;
    }

}
