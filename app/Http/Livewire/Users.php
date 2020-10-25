<?php

namespace App\Http\Livewire;

use App\Models\User;
use Dev\Domain\Service\UserService;
use Dev\Infrastructure\Repository\UserRepository;
use Livewire\Component;
use Livewire\WithFileUploads;

class Users extends Component
{
    use WithFileUploads;
    public $users, $name, $email, $user_id, $image, $phone;
    public $updateMode = false;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.users');
    }

    private function resetInputFields()
    {
        $this->image = '';
        $this->email = '';
        $this->phone = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required_without:phone|email|unique:users',
            'phone' => 'required_without:email|regex:/(01)[0-9]{9}/|unique:users',
        ]);
        $validatedDate['password'] = bcrypt('secret');
        $userService = new UserService(new UserRepository(new User()));
        $userService->register($validatedDate);
        session()->flash('message', 'Users Created Successfully.');
        $this->resetInputFields();
        $this->emit('userStore'); // Close model to using to jquery
    }

    public function edit($id)
    {
        $this->updateMode = true;
        $user = User::where('id', $id)->first();
        $this->user_id = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->phone = $user->phone;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $this->updateMode = true;
        $validatedDate = $this->validate([
            'name' => 'sometimes|required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'sometimes|required_without:phone|email|unique:users,email,' . $this->user_id,
            'phone' => 'sometimes|required_without:email|regex:/(01)[0-9]{9}/|unique:users,phone,' . $this->user_id,
        ]);
        $user = User::where('id', $this->user_id)->first();
        $userService = new UserService(new UserRepository(new User()));
        $userService->updateProfile($user, $validatedDate);
        $this->updateMode = false;
        session()->flash('message', 'Users Updated Successfully.');
        $this->resetInputFields();

    }

    public function delete($id)
    {
        if ($id) {
            User::where('id', $id)->delete();
            session()->flash('message', 'Users Deleted Successfully.');
        }
    }

    public function verify($id)
    {
        if ($id) {
            $user = User::where('id', $id)->first();
            $user->update(['phone_verified_at' => now()]);
            session()->flash('message', 'Account activated secefully.');
        }
    }

    public function disable($id)
    {
        if ($id) {
            $user = User::where('id', $id)->first();
            $user->update(['phone_verified_at' => null]);
            session()->flash('message', 'Account disabled');
        }
    }
}
