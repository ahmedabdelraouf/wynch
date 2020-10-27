<?php

namespace App\Http\Livewire;

use App\Http\Requests\BrandRequest;
use Dev\Domain\Service\BrandService;
use Dev\Infrastructure\Models\Brand;
use Dev\Infrastructure\Models\Category;
use Dev\Infrastructure\Repository\BrandRepository;
use Livewire\Component;
use Livewire\WithFileUploads;

class Brands extends Component
{
    use WithFileUploads;
    public $brands, $categories, $category_id, $name, $description, $ar_name, $ar_description, $image, $brand_id;
    public $updateMode = false;

    public function render()
    {
        $this->brands = Brand::all();
        $this->categories = Category::all();
        return view('livewire.brands');
    }

    private function resetInputFields()
    {
        $this->image = '';
        $this->name = '';
        $this->description = '';
        $this->ar_name = '';
        $this->ar_description = '';
        $this->category_id = '';
    }

    public function store()
    {
        $validatedData = $this->validate(BrandRequest::getStore());
        $brand_data = BrandRequest::getTransatableData($validatedData);
        $brandService = new BrandService(new BrandRepository(new Brand()));
        $brandService->store($brand_data);
        session()->flash('message', 'Brand Created Successfully.');
        $this->resetInputFields();
        $this->emit('BrandStore'); // Close model to using to jquery
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $brand = Brand::where('id', $id)->first();
        $this->brand_id = $id;
        $this->name = $brand->name;
        $this->ar_name = $brand->translate('ar')->name;
        $this->description = $brand->description;
        $this->category_id = $brand->category_id;
        $this->ar_description = $brand->translate('ar')->description;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $this->updateMode = true;
        $validatedData = $this->validate(BrandRequest::getUpdate());
        $brand_data = BrandRequest::getTransatableData($validatedData);
        $brand = Brand::where('id', $this->brand_id)->first();
        $brandService = new BrandService(new BrandRepository(new Brand()));
        $brandService->update($brand_data, $brand);
        session()->flash('message', 'Brand Updated Successfully.');
        $this->resetInputFields();
        $this->emit('BrandStore');
    }

    public function delete($id)
    {
        if ($id) {
            Brand::where('id', $id)->delete();
            session()->flash('message', 'Brand Deleted Successfully.');
        }
    }
}
