<?php

namespace App\Http\Livewire;

use App\Http\Requests\CategoryRequest;
use Dev\Domain\Service\CategoryService;
use Dev\Infrastructure\Models\Category;
use Dev\Infrastructure\Repository\CategoryRepository;
use Livewire\Component;
use Livewire\WithFileUploads;

class Categories extends Component
{

    use WithFileUploads;
    public $categories, $name, $description, $ar_name, $ar_description, $image, $category_id;
    public $updateMode = false;

    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.categories');
    }

    private function resetInputFields()
    {
        $this->image = '';
        $this->name = '';
        $this->description = '';
        $this->ar_name = '';
        $this->ar_description = '';
    }

    public function store()
    {
        $validatedDate = $this->validate(CategoryRequest::getStore());
        $category_data = CategoryRequest::getTransatableData($validatedDate);
        $categoryService = new CategoryService(new CategoryRepository(new Category()));
        $categoryService->store($category_data);
        session()->flash('message', 'Category Created Successfully.');
        $this->resetInputFields();
        $this->emit('categoryStore'); // Close model to using to jquery
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $category = Category::where('id', $id)->first();
        $this->category_id = $id;
        $this->name = $category->name;
        $this->ar_name = $category->translate('ar')->name;
        $this->description = $category->description;
        $this->ar_description = $category->translate('ar')->description;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $this->updateMode = true;
        $validatedDate = $this->validate(CategoryRequest::getUpdate());
        $category_data = CategoryRequest::getTransatableData($validatedDate);
        $category = Category::where('id', $this->category_id)->first();
        $categoryService = new CategoryService(new CategoryRepository(new Category()));
        $categoryService->update($category_data, $category);
        session()->flash('message', 'Category Updated Successfully.');
        $this->resetInputFields();
        $this->emit('categoryStore');
    }

    public function delete($id)
    {
        if ($id) {
            Category::where('id', $id)->delete();
            session()->flash('message', 'Category Deleted Successfully.');
        }
    }


}
