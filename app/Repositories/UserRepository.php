<?php

namespace App\Repositories;

use App\DTOs\UserDTO;
use App\Models\User;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class UserRepository
{
    private User $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @throws UnknownProperties
     */
    public function getDTO(int $id): UserDTO
    {
        $user = $this->user->newQuery()->findOrFail($id);
        return new UserDTO(
            name: $user->name,
            email: $user->email,
        );

    }

}
