<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use App\Http\Resources\VehicleResource;
use Dev\Domain\Service\VehicleService;
use Dev\Infrastructure\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class VehicleController extends Controller
{
    private $VehicleService;

    public function __construct(VehicleService $VehicleService)
    {
        $this->VehicleService = $VehicleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $categories = $this->VehicleService->index($request->all());
        return VehicleResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param VehicleRequest $request
     * @return VehicleResource
     */
    public function store(VehicleRequest $request)
    {
        $vehicle_data = VehicleRequest::getTransatableData($request->validated());
        $vehicle = $this->VehicleService->store($vehicle_data);
        return new VehicleResource($vehicle);
    }

    /**
     * Display the specified resource.
     *
     * @param Vehicle $vehicle
     * @return VehicleResource()
     */
    public function show(Vehicle $vehicle)
    {
        return new VehicleResource($vehicle);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param VehicleRequest $request
     * @param Vehicle $vehicle
     * @return VehicleResource()
     */
    public function update(VehicleRequest $request, Vehicle $vehicle)
    {
        $vehicle_data = VehicleRequest::gettransatableData($request->all());
        $vehicle = $this->VehicleService->update($vehicle_data, $vehicle);
        return new VehicleResource($vehicle);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Car $car
     * @return Response
     * @throws Exception
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle = $this->VehicleService->destroy($vehicle->id);
        if ($vehicle)
            return response(['message' => 'Deleted']);
        else
            return response(['message' => 'Not deleted']);
    }
}
