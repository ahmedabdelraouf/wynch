<?php

namespace Dev\Infrastructure\Repository;

use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

class UserRepository extends AbstractRepository
{
    public function __construct(\App\Models\User $model)
    {
        parent::__construct($model);
    }

}
