<?php

namespace Dev\Infrastructure\Repository;

use Dev\Infrastructure\Models\User;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

class UserRepository extends AbstractRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

}
