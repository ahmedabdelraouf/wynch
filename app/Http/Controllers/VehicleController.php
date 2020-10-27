<?php

namespace App\Http\Controllers;

use Dev\Domain\Service\VehicleService;

class VehicleController extends Controller
{
    private $vehicleService;

    public function __construct(VehicleService $vehicleService)
    {
        $this->vehicleService = $vehicleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('adminlte.vehicles.index');
    }
}
