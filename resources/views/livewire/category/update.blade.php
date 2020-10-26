<div wire:ignore.self class="modal fade" id="updateCategoryModal" tabindex="-1" role="dialog"
     aria-labelledby="updateCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{trans('forms.image')}}</label>
                        <input type="file" class="form-control" id="exampleFormControlInput1" accept="application/*"
                               wire:model="image">
                        @error('image') <span class="text-danger error">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <input type="hidden" wire:model="category_id">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control" wire:model="name" required id="exampleFormControlInput1"
                               placeholder="Enter Name">
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <input type="hidden" wire:model="ar_name">
                        <label for="exampleFormControlInput1">ar Name</label>
                        <input type="text" class="form-control" wire:model="ar_name" required
                               id="exampleFormControlInput1"
                               placeholder="Enter Name">
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">{{trans('general.description')}}</label>
                        <input type="text" class="form-control" wire:model="description" required
                               id="exampleFormControlInput2" placeholder="Description">
                        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">{{trans('general.ar_description')}}</label>
                        <input type="text" class="form-control" wire:model="ar_description" required
                               id="exampleFormControlInput2" placeholder="Arabic description">
                        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">
                    {{trans('forms.close')}}
                </button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary"
                        data-dismiss="modal">{{trans('forms.edit')}}
                    user
                </button>
            </div>
        </div>
    </div>
</div>
