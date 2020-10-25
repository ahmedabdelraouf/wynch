<div>
    @include('livewire.users.create')
    @include('livewire.users.update')
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
            {{ session('message') }}
        </div>
    @endif
    <table class="table table-bordered mt-5">
        <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>phone</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>
                    <img style="width: 3rem;height: 3rem" src="{{ asset($value->image) }}">
                </td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->email }}</td>
                <td>{{ $value->phone }}</td>
                <td>
                    <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $value->id }})"
                            class="btn btn-primary btn-sm">Edit
                    </button>
                    <button wire:click="delete({{ $value->id }})" class="btn btn-danger btn-sm">Delete</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
