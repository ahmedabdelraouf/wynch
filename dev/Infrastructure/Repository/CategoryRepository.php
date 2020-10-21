<?php

namespace Dev\Infrastructure\Repository;


use Dev\Infrastructure\Models\Category;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

class CategoryRepository extends AbstractRepository
{
    /**
     * UserRepository constructor.
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

}
