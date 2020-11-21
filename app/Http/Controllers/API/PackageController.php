<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageRequest;
use App\Http\Resources\PackageResource;
use Dev\Domain\Service\PackageService;
use Dev\Infrastructure\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class PackageController extends Controller
{

    private $service;

    public function __construct(PackageService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $categories = $this->service->index($request->all());
        return PackageResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PackageRequest $request
     * @return PackageResource
     */
    public function store(PackageRequest $request)
    {
        $package_data = [
            'en' => [
                'name' => $request->input('name')
            ],
            'ar' => [
                'name' => $request->input('ar_name')
            ],
            'image' => $request->image,
        ];
        $package = $this->service->store($package_data);
        return new PackageResource($package);
    }

    /**
     * Display the specified resource.
     *
     * @param Package $package
     * @return PackageResource
     */
    public function show(Package $package)
    {
        return new PackageResource($package);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param PackageRequest $request
     * @param Package $package
     * @return PackageResource
     */
    public function update(PackageRequest $request, Package $package)
    {
        $package_data = PackageRequest::gettransatableData($request->all());
        $package = $this->service->update($package_data, $package);
        return new PackageResource($package);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param Package $package
     * @return Response
     */
    public function destroy(Package $package)
    {
        $package = $this->service->destroy($package->id);
        if ($package)
            return response(['message' => 'Deleted']);
        else
            return response(['message' => 'Not deleted']);
    }

}
