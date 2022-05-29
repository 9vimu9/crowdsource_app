<?php

namespace App\DTOs;

use Spatie\DataTransferObject\DataTransferObject;

class UserDTO extends DataTransferObject
{
    public int $id;
    public string $name;
    public string $email;

}
