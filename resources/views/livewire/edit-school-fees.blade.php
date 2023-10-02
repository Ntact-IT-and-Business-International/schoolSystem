<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Update Fees information</h6>
        <div class="card-body">
            <form wire:submit.prevent="updateFees">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Class</label>
                            <select class="custom-select" wire:model="class_id">
                                <option>--Choose class --</option>
                                @foreach ($classes as $class )
                                    <option value="{{$class->id}}">&nbsp; &nbsp;{{$class->level}}</option>
                                @endforeach
                            </select>
                        @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Amount Being Paid</label>
                            <input type="text" class="form-control" wire:model="amount_paid" >
                        @error('amount_paid') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Date of Payment</label>
                        <input type="text" class="form-control" wire:model="date_of_payment" placeholder="">
                        @error('date_of_payment') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Balance</label>
                            <input type="text" class="form-control" wire:model="balance" placeholder="">
                        @error('balance') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="form-label">Mode of Payment</label>
                        <input type="text" class="form-control" wire:model="mode_of_payment" placeholder="">
                        @error('mode_of_payment') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Payment Code</label>
                            <input type="text" class="form-control" wire:model="payment_code">
                        @error('payment_code') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Term</label>
                            <input type="text" class="form-control" wire:model="term">
                        @error('term') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <div wire:loading wire:target="updateFees" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </form>
        </div>
    </div>
</div>
