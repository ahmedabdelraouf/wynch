<div>
    @include('livewire.category.create')
    @include('livewire.category.update')
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
            {{ session('message') }}
        </div>
    @endif
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>image</th>
            <th>name</th>
            <th>description</th>
            <th>created_at</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>

        @if(isset($categories))
            @foreach($categories as $category)
                <tr>
                    <td><img style="width: 5rem;height: 5rem" src="{{asset($category->image)}}"></td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->description}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>
                        <button data-toggle="modal" data-target="#updateCategoryModal"
                                wire:click="edit({{ $category->id }})"
                                class="btn btn-primary btn-sm">{{{trans('forms.edit')}}}
                        </button>
                        <button wire:click="delete({{ $category->id }})"
                                class="btn btn-danger btn-sm">{{{trans('forms.delete')}}}</button>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
