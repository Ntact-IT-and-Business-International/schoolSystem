<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Update Scholastic Item</h6>
        <div class="card-body">
            <form wire:submit.prevent="updateItem">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="form-label">Item</label>
                        <input type="text" class="form-control" wire:model="item_name" placeholder="">
                        @error('item_name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label class="form-label">Stock Quantity</label>
                            <input type="text" class="form-control" wire:model="stock_quantity" placeholder="">
                        @error('stock_quantity') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <div wire:loading wire:target="updateItem" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </form>
        </div>
    </div>
</div>
