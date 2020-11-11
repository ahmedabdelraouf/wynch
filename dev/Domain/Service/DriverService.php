<?php


namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Models\Driver;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;
use Dev\Infrastructure\Repository\DriverRepository;
use Illuminate\Http\Response;
use phpDocumentor\Reflection\Types\Integer;

class DriverService extends AbstractService
{
    /**
     * UserService constructor.
     * @param DriverRepository $repository
     */
    public function __construct(DriverRepository $repository)
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
        $data['national_id'] = $data['national_id']->store('storage/uploads/drivers/national_id', 'public');
        $data['drug_test'] = $data['drug_test']->store('storage/uploads/drivers/drug_test', 'public');
        $data['driving_licence'] = $data['driving_licence']->store('storage/uploads/drivers/driving_licence', 'public');
        $data['car_licence'] = $data['car_licence']->store('storage/uploads/drivers/car_licence', 'public');
        return $this->repository->create($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array $data
     * @param Driver $driver
     * @return AbstractRepository
     */
    public function update(array $data, Driver $driver)
    {
        $this->repository = $driver;
        if (isset($data['image']) && !empty($data['image'])) {
            $data['image'] = $data['image']->store('storage/uploads/drivers/images', 'public');
            if (file_exists($driver->image)) {
                unlink($driver->image);
            }
        } else {
            $data['image'] = $this->repository->image;
        }

        if (isset($data['national_id']) && !empty($data['national_id'])) {
            $data['national_id'] = $data['national_id']->store('storage/uploads/drivers/national_id', 'public');
            if (file_exists($driver->image)) {
                unlink($driver->image);
            }
        }

        if (isset($data['drug_test']) && !empty($data['drug_test'])) {
            $data['drug_test'] = $data['drug_test']->store('storage/uploads/drivers/drug_test', 'public');
            if (file_exists($driver->image)) {
                unlink($driver->image);
            }
        }

        if (isset($data['driving_licence']) && !empty($data['driving_licence'])) {
            $data['driving_licence'] = $data['driving_licence']->store('storage/uploads/drivers/driving_licence', 'public');
            if (file_exists($driver->image)) {
                unlink($driver->image);
            }
        }

        if (isset($data['car_licence']) && !empty($data['car_licence'])) {
            $data['car_licence'] = $data['car_licence']->store('storage/uploads/drivers/car_licence', 'public');
            if (file_exists($driver->image)) {
                unlink($driver->image);
            }
        }

        $this->repository->update($data);
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

    /**
     * @param array $driver_data
     * @param Driver $driver
     * @return Driver|AbstractRepository
     */
    public function changeStatus(array $driver_data, Driver $driver)
    {
        $this->repository = $driver;
        $this->repository->update($driver_data);
        return $this->repository;
    }


}
