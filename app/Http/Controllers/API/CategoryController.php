<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CarResource;
use App\Http\Resources\CategoryResource;
use App\Models\Car;
use Dev\Domain\Service\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

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
     * @param Request $request
     * @return Response
     */
    public function store(CategoryRequest $request)
    {
        $category = $this->categoryService->store($request->validated());
        return new CategoryResource($category);
        }

    /**
     * Display the specified resource.
     *
     * @param Car $car
     * @return Response
     */
    public function show(Car $car)
    {
        return response(['car' => new CarResource($car), 'message' => 'Retrieved successfully'], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Car $car
     * @return Response
     */
    public function update(Request $request, Car $car)
    {
        $car->update($request->all());

        return response(['ceo' => new CarResource($car), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Car $car
     * @return Response
     * @throws Exception
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return response(['message' => 'Deleted']);
    }
}
