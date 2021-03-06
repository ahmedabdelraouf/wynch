<?php


namespace Dev\Domain\Service;

use Dev\Domain\Service\Abstracts\AbstractService;
use Dev\Infrastructure\Models\Category;
use Dev\Infrastructure\Repository\Abstracts\AbstractRepository;
use Dev\Infrastructure\Repository\CategoryRepository;
use Illuminate\Http\Response;
use phpDocumentor\Reflection\Types\Integer;

class CategoryService extends AbstractService
{
    /**
     * UserService constructor.
     * @param CategoryRepository $repository
     */
    public function __construct(CategoryRepository $repository)
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
        if (isset($data['image']))
            $data['image'] = $data['image']->store('storage/uploads/categories', 'public');
        return $this->repository->create($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param array $data
     * @param Category $category
     * @return AbstractRepository
     */
    public function update(array $data, Category $category)
    {
        $this->repository = $category;
        if (isset($data['image']) && !empty($data['image'])) {
            $data['image'] = $data['image']->store('storage/uploads/categories', 'public');
            if (file_exists($category->image)) {
                unlink($category->image);
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
