<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Add PLE Results</h6>
        <div class="card-body">
            <form wire:submit.prevent="submit">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Division 1</label>
                            <input type="text" class="form-control" wire:model="div1" placeholder="">
                        @error('div1') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Division 2</label>
                            <input type="text" class="form-control" wire:model="div2" placeholder="">
                        @error('div2') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Division 3</label>
                            <input type="text" class="form-control" wire:model="div3" placeholder="">
                        @error('div3') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Division 4</label>
                            <input type="text" class="form-control" wire:model="div4" placeholder="">
                        @error('div4') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">U</label>
                            <input type="text" class="form-control" wire:model="U" placeholder="">
                        @error('U') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">X</label>
                            <input type="text" class="form-control" wire:model="X" placeholder="">
                        @error('X') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="form-label">Total</label>
                            <input type="text" class="form-control" wire:model="total" placeholder="">
                        @error('total') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Year</label>
                            <input type="text" class="form-control" wire:model="year" placeholder="">
                        @error('year') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Results</label>
                            <input type="file" class="form-control" wire:model="result" placeholder="">
                        @error('result') <span class="text-danger">{{ $message }}</span> @enderror
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
