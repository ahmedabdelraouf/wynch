<?php

namespace Dev\Domain\Service\Abstracts;

use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;

/**
 * Class AbstractService
 * @package Dev\Domain\Service\Abstracts
 */
class AbstractService
{
    /**
     * @var AbstractRepository
     */
    protected $repository;

    /**
     * AbstractService constructor.
     * @param AbstractRepository $repository
     */
    public function __construct(AbstractRepository $repository)
    {
        $this->repository = $repository;
    }
}
