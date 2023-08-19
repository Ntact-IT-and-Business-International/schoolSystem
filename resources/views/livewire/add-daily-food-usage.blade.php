<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Add Food Item Used</h6>
        <div class="card-body">
            <form wire:submit.prevent="submit"> 
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Item</label>
                            <select class="custom-select" wire:model="itemm_id">
                                @foreach($items as $item)
                                    <option value="{{$item->id}}">&nbsp;&nbsp;{{$item->item_name}}</option>
                                @endforeach
                            </select>
                        @error('itemm_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" wire:model="number" placeholder="">
                        @error('number') <span class="text-danger">{{ $message }}</span> @enderror
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
                            <select class="custom-select" wire:model="unit">
                                    <option value="kg">&nbsp;&nbsp;Kg</option>
                                    <option value="grams">&nbsp;&nbsp;grams</option>
                                    <option value="cups">&nbsp;&nbsp;Cups</option>
                                    <option value="basin">&nbsp;&nbsp;Basin</option>
                                    <option value="bulb">&nbsp;&nbsp;Bulbs</option>
                                    <option value="tomatoes">&nbsp;&nbsp;Tomatoes</option>
                                    <option value="green pepper">&nbsp;&nbsp;Green Paper</option>
                                    <option value="boxes">&nbsp;&nbsp;Boxes</option>
                                    <option value="dozen">&nbsp;&nbsp;Dozen</option>
                                    <option value="yams">&nbsp;&nbsp;Yams</option>
                            </select>
                        @error('unit') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row"> 
                    <div class="form-group col-md-6">
                        <label class="form-label">Person</label>
                            <input type="text" class="form-control" wire:model="responsible_person" placeholder="">
                        @error('responsible_person') <span class="text-danger">{{ $message }}</span> @enderror
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
