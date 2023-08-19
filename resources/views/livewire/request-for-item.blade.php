<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header"> Request For Item</h6>
        <div class="card-body">
            <form wire:submit.prevent="submit"> 
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="form-label">Name of Item</label>
                            <select class="custom-select" wire:model="item_id">
                                @foreach ($items as $item )
                                    <option value="{{$item->id}}">&nbsp;&nbsp;{{$item->item_name}}</option>
                                @endforeach
                            </select>
                        @error('item_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label class="form-label">Office</label>
                            <select class="custom-select" wire:model="office">
                                @foreach ($offices as $office )
                                    <option value="{{$office->id}}">&nbsp;&nbsp;{{$office->category}}</option>
                                @endforeach
                            </select>
                        @error('item_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-12">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" wire:model="number_of_items" placeholder="Amount Paid">
                        @error('number_of_items') <span class="text-danger">{{ $message }}</span> @enderror
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
