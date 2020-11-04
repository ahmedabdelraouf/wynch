<?php

namespace Dev\Infrastructure\Repository;


use Dev\Infrastructure\Models\Driver;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

class DriverRepository extends AbstractRepository
{
    /**
     * DriverRepository constructor.
     * @param Driver $model
     */
    public function __construct(Driver $model)
    {
        parent::__construct($model);
    }

}
