<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Driver\ChangeDriverStatusRequest;
use App\Http\Requests\Driver\DriverRequest;
use App\Http\Resources\DriverResource;
use Dev\Domain\Service\DriverService;
use Dev\Infrastructure\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class DriverController extends Controller
{

    private $service;

    public function __construct(DriverService $driverService)
    {
        $this->service = $driverService;
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
        return DriverResource::collection($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DriverRequest $request
     * @return DriverResource
     */
    public function store(DriverRequest $request)
    {
        $driver_data = $request->validated();
        $driver = $this->service->store($driver_data);
        return new DriverResource($driver);
    }

    /**
     * Display the specified resource.
     *
     * @param Driver $driver
     * @return DriverResource
     */
    public function show(Driver $driver)
    {
        return new DriverResource($driver);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DriverRequest $request
     * @param Driver $driver
     * @return DriverResource
     */
    public function update(DriverRequest $request, Driver $driver)
    {
        $driver_data = $request->validated();
        $driver = $this->service->update($driver_data, $driver);
        return new DriverResource($driver);
    }

    /**
     * @param ChangeDriverStatusRequest $request
     * @param Driver $driver
     * @return DriverResource
     */
    public function changeStatus(Driver $driver, ChangeDriverStatusRequest $request)
    {
        $driver_data = $request->validated();
        $driver = $this->service->changeStatus($driver_data, $driver);
        return new DriverResource($driver);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Driver $driver
     * @return Response
     */
    public function destroy(Driver $driver)
    {
        $driver = $this->service->destroy($driver->id);
        if ($driver)
            return response(['message' => 'Deleted']);
        else
            return response(['message' => 'Not deleted']);
    }
}
