<div>
    @include('livewire.vehicle.create')
    @include('livewire.vehicle.update')
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x{{ session('message') }}</div>
    @endif
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>{{trans('general.image')}}</th>
            <th>{{trans('general.name')}}</th>
            <th>{{trans('general.description')}}</th>
            <th>{{trans('general.brand')}}</th>
            <th>{{trans('general.created_at')}}</th>
            <th>{{trans('general.action')}}</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($vehicles))
            @foreach($vehicles as $vehicle)
                <tr>
                    <td><img style="width: 5rem;height: 5rem" src="{{asset($vehicle->image)}}"></td>
                    <td>{{$vehicle->name}}</td>
                    <td>{{$vehicle->description}}</td>
                    <td>{{$vehicle->brand->name}}</td>
                    <td>{{$vehicle->created_at}}</td>
                    <td>
                        <button data-toggle="modal" data-target="#updateCategoryModal"
                                wire:click="edit({{ $vehicle->id }})"
                                class="btn btn-primary btn-sm">{{{trans('forms.edit')}}}
                        </button>
                        <button wire:click="delete({{ $vehicle->id }})"
                                class="btn btn-danger btn-sm">{{{trans('forms.delete')}}}</button>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
