<?php


namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Models\Package;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;
use Dev\Infrastructure\Repository\PackageRepository;
use Illuminate\Http\Response;
use phpDocumentor\Reflection\Types\Integer;

class PackageService extends AbstractService
{
    /**
     * UserService constructor.
     * @param PackageRepository $repository
     */
    public function __construct(PackageRepository $repository)
    {
        parent::__construct($repository);
    }

    /**
     * @param array $filters
     * @return
     */
    public function
    index(array $filters = [])
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
        if (isset($data['image']))
            $data['image'] = $data['image']->store('storage/uploads/packages', 'public');
        return $this->repository->create($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array $data
     * @param Package $package
     * @return AbstractRepository
     */
    public function update(array $data, Package $package)
    {
        $this->repository = $package;
        if (isset($data['image']) && !empty($data['image'])) {
            $data['image'] = $data['image']->store('storage/uploads/packages', 'public');
            if (file_exists($package->image)) {
                unlink($package->image);
            }
        } else {
            $data['image'] = $this->repository->image;
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


}
