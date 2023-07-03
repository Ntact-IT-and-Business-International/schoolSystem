<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="card mb-4">
        <h6 class="card-header">Clear School Fees</h6>
        <div class="card-body">
            <form wire:submit.prevent="clearPayment">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="form-label">Amount Paid</label>
                            <input type="text" class="form-control" wire:model="amount_paid" placeholder="">
                        @error('amount_paid') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="form-label">Balance</label>
                        <input type="text" class="form-control" wire:model="balance" placeholder="">
                        @error('balance') <span class="text-danger">{{ $message }}</span> @enderror
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
