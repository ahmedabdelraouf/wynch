<?php

namespace App\Http\Livewire;

use App\Http\Requests\VehicleRequest;
use Dev\Domain\Service\VehicleService;
use Dev\Infrastructure\Models\Brand;
use Dev\Infrastructure\Models\Vehicle;
use Dev\Infrastructure\Repository\VehicleRepository;
use Livewire\Component;
use Livewire\WithFileUploads;

class packages extends Component
{
    use WithFileUploads;
    public $vehicles, $brands, $brand_id, $name, $description, $ar_name, $ar_description, $image, $vehicle_id;
    public $updateMode = false;

    public function render()
    {
        $this->vehicles = Vehicle::all();
        $this->brands = Brand::all();
        return view('livewire.vehicles');
    }

    private function resetInputFields()
    {
        $this->image = '';
        $this->name = '';
        $this->description = '';
        $this->ar_name = '';
        $this->ar_description = '';
        $this->brand_id = '';
    }

    public function store()
    {
        $validatedData = $this->validate(VehicleRequest::getStore());
        $vehicle_data = VehicleRequest::getTransatableData($validatedData);
        $vehicleService = new VehicleService(new VehicleRepository(new Vehicle()));
        $vehicleService->store($vehicle_data);
        session()->flash('message', 'Vehicle Created Successfully.');
        $this->resetInputFields();
        $this->emit('VehicleStore');
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $vehicle = Vehicle::where('id', $id)->first();
        $this->vehicle_id = $id;
        $this->name = $vehicle->name;
        $this->ar_name = $vehicle->translate('ar')->name;
        $this->description = $vehicle->description;
        $this->brand_id = $vehicle->brand_id;
        $this->ar_description = $vehicle->translate('ar')->description;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $this->updateMode = true;
        $validatedData = $this->validate(VehicleRequest::getUpdate());
        $vehicle_data = VehicleRequest::getTransatableData($validatedData);
        $vehicle = Vehicle::where('id', $this->vehicle_id)->first();
        $vehicleService = new VehicleService(new VehicleRepository(new Vehicle()));
        $vehicleService->update($vehicle_data, $vehicle);
        session()->flash('message', 'Vehicle Updated Successfully.');
        $this->resetInputFields();
        $this->emit('VehicleStore');
    }

    public function delete($id)
    {
        if ($id) {
            Vehicle::where('id', $id)->delete();
            session()->flash('message', 'Vehicle Deleted Successfully.');
        }
    }
}
