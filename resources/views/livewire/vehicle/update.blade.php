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
                @include('livewire.vehicle.form')
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
