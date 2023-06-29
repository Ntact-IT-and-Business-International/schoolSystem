<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Add Student Cash Deposits</h6>
        <div class="card-body">
            <form wire:submit.prevent="submit">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Name of student</label>
                            <select class="custom-select" wire:model="student_id">
                                @foreach ($students as $student )
                                    <option value="{{$student->id}}">{{$student->last_name}} {{$student->first_name}} {{$student->other_names}}</option>
                                @endforeach
                            </select>
                        @error('student_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Term</label>
                        <select class="custom-select" wire:model="term">
                                    <option value="1">Term 1</option>
                                    <option value="2">Term 2</option>
                                    <option value="3">Term 3</option>
                            </select>
                        @error('term') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Cash Amount</label>
                        <input type="number" class="form-control" wire:model="amount_deposited" placeholder="">
                        @error('amount_deposited') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Date of Entry</label>
                            <input type="date" class="form-control" wire:model="date_of_deposit" placeholder="">
                        @error('date_of_deposit') <span class="text-danger">{{ $message }}</span> @enderror
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
