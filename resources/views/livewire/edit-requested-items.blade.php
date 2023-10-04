<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Update Requested Items</h6>
        <div class="card-body">
            <form wire:submit.prevent="updateRequestedItems">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="form-label">Item</label>
                        <select class="custom-select" wire:model="item_id">
                                <option>--Choose Item --</option>
                                @foreach ($items as $item )
                                    <option value="{{$item->id}}">&nbsp; &nbsp;{{$item->item_name}}</option>
                                @endforeach
                            </select>
                        @error('item_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="form-label">Number of Item</label>
                        <input type="text" class="form-control" wire:model="number_of_items" placeholder="">
                        @error('number_of_items') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <div wire:loading wire:target="updateRequestedItems" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </form>
        </div>
    </div>
</div>
