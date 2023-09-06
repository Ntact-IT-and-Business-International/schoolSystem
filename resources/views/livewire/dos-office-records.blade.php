<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Add Item Used</h6>
        <div class="card-body">
            <form wire:submit.prevent="submit"> 
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Item</label>
                            <select class="custom-select" wire:model="items_id">
                                @foreach($items as $item)
                                    <option value="{{$item->id}}">&nbsp;&nbsp;{{$item->item_name}}</option>
                                @endforeach
                            </select>
                        @error('items_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" wire:model="quantity" placeholder="">
                        @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Term</label>
                            <select class="custom-select" wire:model="term">
                                    <option value="1">&nbsp;&nbsp;Term 1</option>
                                    <option value="2">&nbsp;&nbsp;Term 2</option>
                                    <option value="3">&nbsp;&nbsp;Term 3</option>
                            </select>
                        @error('term') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Units</label>
                            <select class="custom-select" wire:model="units">
                                    <option value="Books">&nbsp;&nbsp;Books</option>
                                    <option value="Pens">&nbsp;&nbsp;Pens</option>
                                    <option value="Carton">&nbsp;&nbsp;Carton</option>
                                    <option value="Boxes">&nbsp;&nbsp;Boxes</option>
                                    <option value="Dozen">&nbsp;&nbsp;Dozen</option>
                            </select>
                        @error('units') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row"> 
                    <div class="form-group col-md-6">
                        <label class="form-label">Staff Name</label>
                            <select class="custom-select" wire:model="staff_id">
                                @foreach($staffs as $staff)
                                    <option value="{{$staff->id}}">{{$staff->staff_last_name}} {{$staff->staff_first_name}} {{$staff->staff_other_names}}</option>
                                @endforeach
                            </select>
                        @error('staff_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Date </label>
                            <input type="date" class="form-control" wire:model="date" placeholder="">
                        @error('date') <span class="text-danger">{{ $message }}</span> @enderror
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
