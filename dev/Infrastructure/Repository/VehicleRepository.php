<?php

namespace Dev\Infrastructure\Repository;


use Dev\Infrastructure\Models\Vehicle;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

class VehicleRepository extends AbstractRepository
{
    /**
     * UserRepository constructor.
     * @param Vehicle $model
     */
    public function __construct(Vehicle $model)
    {
        parent::__construct($model);
    }

}
