<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Add Expenditure</h6>
        <div class="card-body">
            <form wire:submit.prevent="submit">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Item</label>
                        <input type="text" class="form-control" wire:model="item" placeholder="Item">
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
                    <div class="form-group col-md-4">
                        <label class="form-label">Office in Charge</label>
                            <select class="custom-select" wire:model="user_type_id">
                                @foreach($user_types as $type)
                                    <option value="{{$type->id}}">&nbsp;&nbsp;{{$type->category}}</option>
                                @endforeach
                            </select>
                        @error('user_type_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Signed By</label>
                        <input type="text" class="form-control" wire:model="signed_by" placeholder="">
                        @error('signed_by') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Term</label>
                        <select class="custom-select" wire:model="term">
                                    <option value="1">&nbsp;&nbsp;Term 1</option>
                                    <option value="2">&nbsp;&nbsp;Term 2</option>
                                    <option value="3">&nbsp;&nbsp;Term 2</option>
                            </select>
                        @error('term') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <div wire:loading wire:target="submit" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </form>
        </div>
    </div>
</div>
