<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Add Complain Reply</h6>
        <div class="card-body">
            <form wire:submit.prevent="replyParentsComplain">
                
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="form-label">Reply Complain</label>
                        <textarea type="text" class="form-control" wire:model="reply" placeholder=""></textarea>
                        @error('reply') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <div wire:loading wire:target="replyParentsComplain" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </form>
        </div>
    </div>
</div>
