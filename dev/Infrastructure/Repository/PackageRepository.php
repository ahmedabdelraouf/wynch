<?php

namespace Dev\Infrastructure\Repository;


use Dev\Infrastructure\Models\Package;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class PackageRepository
 * @package Dev\Infrastructure\Repository
 */
class PackageRepository extends AbstractRepository
{
    /**
     * PackageRepository constructor.
     * @param Package $model
     */
    public function __construct(Package $model)
    {
        parent::__construct($model);
    }

}
