<form>
    <div class="form-group">
        <label for="exampleFormControlInput1">{{trans('general.image')}}</label>
        <input type="file" class="form-control" id="exampleFormControlInput1" accept="application/*"
               wire:model="image">
        @error('image') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">{{trans('general.category')}}</label>

        <select class="form-control " wire:model="category_id" style="width: 100%;">
            <option selected="selected" disabled></option>
            @if(isset($categories))
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            @endif
        </select>
        @error('category_id') <span class="text-danger error">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <input type="hidden" wire:model="user_id">
        <label for="exampleFormControlInput1">{{trans('general.name')}}</label>
        <input type="text" class="form-control" wire:model="name" required id="exampleFormControlInput1"
               placeholder="Enter Name">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <input type="hidden" wire:model="ar_name">
        <label for="exampleFormControlInput1">{{trans('forms.ar_name')}}</label>
        <input type="text" class="form-control" wire:model="ar_name" required
               id="exampleFormControlInput1"
               placeholder="Enter Name">
        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">{{trans('forms.description')}}</label>
        <input type="text" class="form-control" wire:model="description" required
               id="exampleFormControlInput2" placeholder="Description">
        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput2">{{trans('forms.ar_description')}}</label>
        <input type="text" class="form-control" wire:model="ar_description" required
               id="exampleFormControlInput2" placeholder="Arabic description">
        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
</form>
