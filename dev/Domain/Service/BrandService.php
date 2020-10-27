<?php


namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Models\Brand;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;
use Dev\Infrastructure\Repository\BrandRepository;
use Illuminate\Http\Response;
use phpDocumentor\Reflection\Types\Integer;

class BrandService extends AbstractService
{
    /**
     * UserService constructor.
     * @param BrandRepository $repository
     */
    public function __construct(BrandRepository $repository)
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
        if (isset($data['image']) && !empty($data['image']))
            $data['image'] = $data['image']->store('storage/uploads/brands', 'public');
        return $this->repository->create($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array $data
     * @param Brand $brand
     * @return AbstractRepository
     */
    public function update(array $data, Brand $brand)
    {
        $this->repository = $brand;
        if (isset($data['image']) && !empty($data['image'])) {
            $data['image'] = $data['image']->store('storage/uploads/categories', 'public');
            if (file_exists($brand->image)) {
                unlink($brand->image);
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
