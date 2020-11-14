<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserVehicleRequest;
use App\Http\Requests\VehicleRequest;
use App\Http\Resources\UserVehicleResource;
use App\Http\Resources\VehicleResource;
use Dev\Domain\Service\UserVehicleService;
use Dev\Infrastructure\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class UserVehicleController extends Controller
{
    private $userVehicleService;

    public function __construct(UserVehicleService $VehicleService)
    {
        $this->userVehicleService = $VehicleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $categories = $this->userVehicleService->index($request->all());
        return VehicleResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserVehicleRequest $request
     * @return UserVehicleResource
     */
    public function store(UserVehicleRequest $request)
    {
        $vehicle_data = $request->validated();
        $vehicle = $this->userVehicleService->store($vehicle_data);
        return new UserVehicleResource($vehicle);
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
        $vehicle = $this->userVehicleService->update($vehicle_data, $vehicle);
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
        $vehicle = $this->userVehicleService->destroy($vehicle->id);
        if ($vehicle)
            return response(['message' => 'Deleted']);
        else
            return response(['message' => 'Not deleted']);
    }
}
