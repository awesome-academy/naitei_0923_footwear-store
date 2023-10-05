<?php

namespace App\Repositories;

use App\Repositories\Contracts\UserRepositoryInterface;
use App\Models\User;

class UserRepository extends AbstractRepository implements UserRepositoryInterface
{
    public function model()
    {
        return app(User::class);
    }

    public function getModel()
    {
        return User::class;
    }
}
