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
            <th>phone verified</th>
            <th>UserType</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>
                    <img style="width: 3rem;height: 3rem" src="{{ asset($user->image) }}">
                </td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>
                    @if(isset($user->phone_verified_at))
                        <h6>{{ $user->phone_verified_at->format('d M Y - H:i:s')  }}</h6>
                        <button style="margin-top: .5rem" wire:click="disable({{ $user->id }})"
                                class="btn btn-danger btn-sm">Disable account
                        </button>
                    @else
                        <button style="margin-top: .5rem" wire:click="verify({{ $user->id }})"
                                class="btn btn-info btn-sm">Activate account
                        </button>
                @endif
                <td>{{ $user->type }}</td>
                <td>
                    <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $user->id }})"
                            class="btn btn-primary btn-sm">Edit
                    </button>
                    <button wire:click="delete({{ $user->id }})" class="btn btn-danger btn-sm">Delete</button>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
