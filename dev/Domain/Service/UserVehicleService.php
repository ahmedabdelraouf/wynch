<?php


namespace Dev\Domain\Service;

use App\Models\User;
use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Models\Vehicle;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;
use Dev\Infrastructure\Repository\UserVehicleRepository;
use Illuminate\Http\Response;
use phpDocumentor\Reflection\Types\Integer;

class UserVehicleService extends AbstractService
{
    /**
     * UserService constructor.
     * @param UserVehicleRepository $repository
     */
    public function __construct(UserVehicleRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $filters
     * @return
     */
    public function index(array $filters = [])
    {
        return $this->repository->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param array $data
     * @return Response
     */
    public function store(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array $data
     * @param Vehicle $vehicle
     * @return AbstractRepository
     */
    public function update(array $data, Vehicle $vehicle)
    {
        return $this->repository;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Integer $id
     * @return Response
     */
    public function destroy(int $id)
    {
        return $this->repository->where('id', $id)->delete();
    }

    public function getUserVehicles(User $user)
    {

    }

}
