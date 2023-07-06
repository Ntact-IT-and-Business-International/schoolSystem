<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Update Salary information</h6>
        <div class="card-body">
            <form wire:submit.prevent="updateSalary">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Name of Staff</label>
                            <select class="custom-select" wire:model="staff_id">
                                @foreach ($staffs as $staff )
                                    <option value="{{$staff->id}}">{{$staff->staff_last_name}} {{$staff->staff_first_name}} {{$staff->staff_other_names}}</option>
                                @endforeach
                            </select>
                        @error('staff_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Date of Payment</label>
                        <input type="date" class="form-control" wire:model="paid_on_date" placeholder="">
                        @error('paid_on_date') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Actual Salary Amount</label>
                        <input type="number" class="form-control" wire:model="actual_salary" placeholder="">
                        @error('actual_salary') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Amount Paid</label>
                            <input type="number" class="form-control" wire:model="amount" placeholder="">
                        @error('amount') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <div wire:loading wire:target="updateSalary" class="text-success">Wait We are Saving Your Data...</div>
                </div>
            </form>
        </div>
    </div>
</div>
