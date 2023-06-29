<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Add Sickbay Requests</h6>
        <div class="card-body">
            <form wire:submit.prevent="submit">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Name of Medicine</label>
                            <select class="custom-select" wire:model="medicine_id">
                                @foreach ($sickbay_requests as $sickbay )
                                    <option value="{{$sickbay->id}}">{{$sickbay->medicine_name}}</option>
                                @endforeach
                            </select>
                        @error('medicine_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Quantity</label>
                        <input type="text" class="form-control" wire:model="quantity" placeholder="">
                        @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Amount</label>
                        <input type="number" class="form-control" wire:model="amount" placeholder="">
                        @error('amount') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Types</label>
                            <select class="custom-select" wire:model="type">
                                    <option value="Tablets">Tablets</option>
                                    <option value="Syrup">Syrup</option>
                                    <option value="Capsules">Capsules</option>
                                    <option value="Injection">Injection</option>
                                    <option value="Intranenous">Iv</option>
                                    <option value="Cream">Cream</option>
                                    <option value="Drops">Drops</option>
                                    <option value="Solution">Solution</option>
                            </select>
                        @error('type') <span class="text-danger">{{ $message }}</span> @enderror
                    </div> 
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="form-label">Office InCharge</label>
                            <select class="custom-select" wire:model="office_incharge_id">
                                @foreach ($user_types as $type )
                                    <option value="{{$type->id}}">{{$type->category}}</option>
                                @endforeach
                            </select>
                        @error('office_incharge_id') <span class="text-danger">{{ $message }}</span> @enderror
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
