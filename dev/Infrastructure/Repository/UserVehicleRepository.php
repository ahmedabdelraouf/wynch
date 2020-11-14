<?php

namespace Dev\Infrastructure\Repository;


use Dev\Infrastructure\Models\UserVehicles;
use Dev\Infrastructure\Models\Vehicle;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

class UserVehicleRepository extends AbstractRepository
{
    /**
     * UserRepository constructor.
     * @param Vehicle $model
     */
    public function __construct(UserVehicles $model)
    {
        parent::__construct($model);
    }

}
