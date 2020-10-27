<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#VehicleModal">
    {{trans('general.add_vehicle')}}
</button>

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="VehicleModal" tabindex="-1" role="dialog"
     aria-labelledby="BrandModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                @include('livewire.vehicle.form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn"
                        data-dismiss="modal">{{trans('forms.close')}}</button>
                <button type="button" wire:click.prevent="store()"
                        class="btn btn-primary close-modal">{{trans('forms.create')}}
                </button>
            </div>
        </div>
    </div>
</div>
