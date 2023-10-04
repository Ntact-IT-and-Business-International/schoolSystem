<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Reject Requested Items</h6>
        <div class="card-body">
            <form wire:submit.prevent="rejectRequestedItem">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="form-label">Write Reason Of Rejecting</label>
                        <textarea type="text"  rows="5" class="form-control" wire:model="comment" placeholder=""></textarea>
                        @error('comment') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <div wire:loading wire:target="rejectRequestedItem" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </form>
        </div>
    </div>
</div>
