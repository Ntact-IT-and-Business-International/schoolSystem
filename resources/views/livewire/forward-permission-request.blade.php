<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Forward Permission Request</h6>
        <div class="card-body">
            <form wire:submit.prevent="submit">
                <div class="form-row">
                        <label class="form-label">Choose Office</label>
                            <select class="custom-select" wire:model="user_type">
                                @foreach ($user_types as $type )
                                    <option value="{{$type->id}}">{{$type->category}}</option>
                                @endforeach
                            </select>
                        @error('user_type') <span class="text-danger">{{ $message }}</span> @enderror
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
