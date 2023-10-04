<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Update Expenditure</h6>
        <div class="card-body">
            <form wire:submit.prevent="updateExpenditure">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Item</label>
                            <input type="text" class="form-control" wire:model="item" placeholder="">
                        @error('item') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Quantity</label>
                            <input type="number" class="form-control" wire:model="quantity" placeholder="">
                        @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Unit Price</label>
                        <input type="number" class="form-control" wire:model="unit_price" placeholder="">
                        @error('unit_price') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Amount</label>
                            <input type="number" class="form-control" wire:model="amount" placeholder="">
                        @error('amount') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Responsible Person</label>
                        <input type="text" class="form-control" wire:model="signed_by" placeholder="">
                        @error('signed_by') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Term</label>
                            <input type="number" class="form-control" wire:model="term" placeholder="">
                        @error('term') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <div wire:loading wire:target="updateExpenditure" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </form>
        </div>
    </div>
</div>
