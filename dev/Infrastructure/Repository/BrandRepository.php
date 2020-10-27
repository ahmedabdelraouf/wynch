<?php

namespace Dev\Infrastructure\Repository;


use Dev\Infrastructure\Models\Brand;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

class BrandRepository extends AbstractRepository
{
    /**
     * BrandRepository constructor.
     * @param Brand $model
     */
    public function __construct(Brand $model)
    {
        parent::__construct($model);
    }

}
