<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Add Service</h6>
        <div class="card-body">
            <form wire:submit.prevent="submit">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Service</label>
                            <input type="text" class="form-control" wire:model="service" placeholder="">
                        @error('service') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Content</label>
                        <input type="text" class="form-control" wire:model="content" placeholder="">
                        @error('content') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="form-label">Service Photo</label>
                            <input type="file" class="form-control" wire:model="image" placeholder="">
                            <div wire:loading wire:target="image" style="color:green;"><strong>Uploading Image, Please Wait...</strong></div>
                        @error('image') <span class="text-danger">{{ $message }}</span> @enderror
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
