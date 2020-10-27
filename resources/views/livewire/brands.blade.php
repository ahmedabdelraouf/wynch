<div>
    @include('livewire.Brand.create')
    @include('livewire.Brand.update')
    @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x{{ session('message') }}</div>
    @endif
    <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>{{trans('general.image')}}</th>
            <th>{{trans('general.name')}}</th>
            <th>{{trans('general.description')}}</th>
            <th>{{trans('general.category')}}</th>
            <th>{{trans('general.created_at')}}</th>
            <th>{{trans('general.action')}}</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($brands))
            @foreach($brands as $brand)
                <tr>
                    <td><img style="width: 5rem;height: 5rem" src="{{asset($brand->image)}}"></td>
                    <td>{{$brand->name}}</td>
                    <td>{{$brand->description}}</td>
                    <td>{{$brand->category->name}}</td>
                    <td>{{$brand->created_at}}</td>
                    <td>
                        <button data-toggle="modal" data-target="#updateCategoryModal"
                                wire:click="edit({{ $brand->id }})"
                                class="btn btn-primary btn-sm">{{{trans('forms.edit')}}}
                        </button>
                        <button wire:click="delete({{ $brand->id }})"
                                class="btn btn-danger btn-sm">{{{trans('forms.delete')}}}</button>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
</div>
