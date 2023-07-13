<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Upload Photo Now</h6>
        <div class="card-body">
            <form wire:submit.prevent="uploadPhotoNow">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="form-label">Upload Photo</label>
                        <input type="file" class="form-control" wire:model="photo" placeholder="" accept=".jpg,.png,.webp">
                        <div wire:loading wire:target="photo" style="color:green;"><strong>Uploading Image, Please Wait...</strong></div>
                        @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <div wire:loading wire:target="uploadPhotoNow" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </form>
        </div>
    </div>
</div>

