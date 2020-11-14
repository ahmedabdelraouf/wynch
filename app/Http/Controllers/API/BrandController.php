<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Resources\BrandResource;
use App\Http\Resources\VehicleResource;
use Dev\Domain\Service\BrandService;
use Dev\Infrastructure\Models\Brand;
use Dev\Infrastructure\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class BrandController extends Controller
{
    private $BrandService;

    public function __construct(BrandService $BrandService)
    {
        $this->BrandService = $BrandService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $categories = $this->BrandService->index($request->all());
//        dd('here',$categories);
        return BrandResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BrandRequest $request
     * @return BrandResource
     */
    public function store(BrandRequest $request)
    {
        $category_data = BrandRequest::getTransatableData($request->validated());
        $category = $this->BrandService->store($category_data);
        return new BrandResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param Category $car
     * @return BrandResource()
     */
    public function show(Category $category)
    {
        return new BrandResource($category);
    }

    /**
     * Display the specified resource.
     *
     * @param Brand $brand
     * @return AnonymousResourceCollection ()
     */
    public function brandVehicles(Brand $brand)
    {
        return VehicleResource::collection($brand->vehicles()->get());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BrandRequest $request
     * @param Category $car
     * @return BrandResource()
     */
    public function update(BrandRequest $request, Category $category)
    {
        $category_data = BrandRequest::gettransatableData($request->all());
        $category = $this->BrandService->update($category_data, $category);
        return new BrandResource($category);
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
        $category = $this->BrandService->destroy($category->id);
        if ($category)
            return response(['message' => 'Deleted']);
        else
            return response(['message' => 'Not deleted']);
    }
}
