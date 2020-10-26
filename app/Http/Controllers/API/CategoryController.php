<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
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
//        $image = $category->image;
//        if (isset($request->image)) {
//            $image = $request->image;
//        }
        $category_data = [
            'en' => [
                'name' => $request->input('name')
            ],
            'ar' => [
                'name' => $request->input('ar_name')
            ],
            'image' => $request->image
        ];
//        dd($category_data);
        $category = $this->categoryService->update($category_data, $category);
        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Car $car
     * @return Response
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        $category = $this->categoryService->destroy($category->id);
        if ($category)
            return response(['message' => 'Deleted']);
        else
            return response(['message' => 'Not deleted']);
    }
}
