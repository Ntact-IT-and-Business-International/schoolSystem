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
                                    <option value="Nursery"> &nbsp;&nbsp;Nursery</option>
                                    <option value="P.1-p.3">&nbsp;&nbsp;P.1 -P.3</option>
                                    <option value="P.4-p.7">&nbsp;&nbsp;P.4-p.7</option>
                                    <option value="Baby">&nbsp;&nbsp;Baby</option>
                                    <option value="Middle">&nbsp;&nbsp;Middle</option>
                                    <option value="Top">&nbsp;&nbsp;Top</option>
                                    <option value="P.1">&nbsp;&nbsp;P.1</option>
                                    <option value="P.2">&nbsp;&nbsp;P.2</option>
                                    <option value="P.3">&nbsp;&nbsp;P.3</option>
                                    <option value="P.4">&nbsp;&nbsp;P.4</option>
                                    <option value="P.5">&nbsp;&nbsp;P.5</option>
                                    <option value="P.6">&nbsp;&nbsp;P.6</option>
                                    <option value="P.7">&nbsp;&nbsp;P.7</option>
                            </select>
                        @error('levels') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Category</label>
                        <select class="custom-select" wire:model="category">
                                <option value="Day">&nbsp;&nbsp;Day</option>
                                <option value="Boarding">&nbsp;&nbsp;Boarding</option>
                                <option value="Day and Boarding">&nbsp;&nbsp;Day and Boarding</option>
                        </select>
                        @error('category') <span class="text-danger">{{ $message }}</span> @enderror
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
