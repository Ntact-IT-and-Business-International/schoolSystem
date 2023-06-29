<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Add Fees Structure</h6>
        <div class="card-body">
            <form wire:submit.prevent="submit">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Class</label>
                            <select class="custom-select" wire:model="levels">
                                    <option value="Nursery">Nursery</option>
                                    <option value="P.1-p.3">P.1 -P.3</option>
                                    <option value="P.4-p.7">P.4-p.7</option>
                                    <option value="Baby">Baby</option>
                                    <option value="Middle">Middle</option>
                                    <option value="Top">Top</option>
                                    <option value="P.1">P.1</option>
                                    <option value="P.2">P.2</option>
                                    <option value="P.3">P.3</option>
                                    <option value="P.4">P.4</option>
                                    <option value="P.5">P.5</option>
                                    <option value="P.6">P.6</option>
                                    <option value="P.7">P.7</option>
                            </select>
                        @error('levels') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Category</label>
                        <select class="custom-select" wire:model="category">
                                <option value="Day">Day</option>
                                <option value="Boarding">Boarding</option>
                                <option value="Day and Boarding">Day and Boarding</option>
                        </select>
                        @error('category') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Term</label>
                            <select class="custom-select" wire:model="term">
                                    <option value="1">Term 1</option>
                                    <option value="2">Term 2</option>
                                    <option value="3">Term 3</option>
                            </select>
                        @error('term') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Upload Fees Structure</label>
                            <input type="file" class="form-control" wire:model="fee_structure" placeholder="">
                        @error('fee_structure') <span class="text-danger">{{ $message }}</span> @enderror
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
