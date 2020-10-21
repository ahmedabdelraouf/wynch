<?php

namespace Dev\Infrastructure\Repository\Abstracts;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * AbstractRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param $name
     * @param $arguments
     */
    public function __call($method, $arguments)
    {
      return  $this->model->{$method}(...$arguments);
    }

}
