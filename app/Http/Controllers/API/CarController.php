<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CarResource;
use App\Models\Car;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $cars = Car::all();
        return response(['cars' => CarResource::collection($cars), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|max:255',
            'year' => 'required|max:255',
            'plate_number' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $car = Car::create($data);

        return response(['ceo' => new CarResource($car), 'message' => 'Created successfully'], 200);
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
