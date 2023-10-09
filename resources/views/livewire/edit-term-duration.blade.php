<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card-body pb-2">
                    <form wire:submit.prevent="updateTermDuration">
                    <div class="form-group">
                            <label class="form-label font-weight-bold"> Term</label>
                            <input type="text" class="form-control" wire:model="term">
                        </div>
                        <div class="form-group">
                            <label class="form-label font-weight-bold"> Starting Date</label>
                            <input type="text" class="form-control" wire:model="start_date">
                        </div>
                        <div class="form-group">
                            <label class="form-label font-weight-bold">End of Term</label>
                            <input type="text" class="form-control" wire:model="end_date">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                        <div wire:loading wire:target="updateTermDuration" class="text-success">Wait We are Saving Your Data...</div>
                    </form> 
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
   </div>
</div>
