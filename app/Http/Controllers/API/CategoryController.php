<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\BrandResource;
use App\Http\Resources\CategoryResource;
use App\Models\Car;
use Dev\Domain\Service\CategoryService;
use Dev\Infrastructure\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $categories = $this->categoryService->index($request->all());
        return CategoryResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryRequest $request
     * @return CategoryResource
     */
    public function store(CategoryRequest $request)
    {
        $category_data = [
            'en' => [
                'name' => $request->input('name')
            ],
            'ar' => [
                'name' => $request->input('ar_name')
            ],
            'image' => $request->image,
        ];
        $category = $this->categoryService->store($category_data);
        return new CategoryResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param Category $car
     * @return CategoryResource
     */
    public function show(Category $category)
    {
        return new CategoryResource($category);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param Category $car
     * @return CategoryResource
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category_data = CategoryRequest::gettransatableData($request->all());
        $category = $this->categoryService->update($category_data, $category);
        return new CategoryResource($category);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        $category = $this->categoryService->destroy($category->id);
        if ($category)
            return response(['message' => 'Deleted']);
        else
            return response(['message' => 'Not deleted']);
    }

    /**
     * @param Category $category
     * @return AnonymousResourceCollection
     */
    public function categoryBrands(Category $category)
    {
//        dd($category->brands()->get()->toArray());
        return BrandResource::collection($category->brands()->get());
    }
}
