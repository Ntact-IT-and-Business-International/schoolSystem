<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="card mb-4">
        <h6 class="card-header">Add Fees Payment</h6>
        <div class="card-body">
            <form wire:submit.prevent="submit">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="form-label">Name of Student</label>
                            <select class="custom-select" wire:model="student_id">
                                @foreach ($students as $student )
                                    <option value="{{$student->id}}">&nbsp;&nbsp;{{$student->last_name}} {{$student->first_name}} {{$student->other_names}}</option>
                                @endforeach
                            </select>
                        @error('student_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Amount Paid</label>
                        <input type="number" class="form-control" wire:model="amount_paid" placeholder="Amount Paid">
                        @error('amount_paid') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Class</label>
                            <select class="custom-select" wire:model="class_id">
                                @foreach ($classes as $class )
                                    <option value="{{$class->id}}">&nbsp;&nbsp;{{$class->level}}</option>
                                @endforeach
                            </select>
                        @error('class_id') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label class="form-label">Balance</label>
                        <input type="number" class="form-control" wire:model="balance" placeholder="Balance">
                        @error('balance') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">Mode of Payment</label>
                            <select class="custom-select" wire:model="mode_of_payment">
                                    <option value="Bank">&nbsp;&nbsp;Bank</option>
                                    <option value="Mobile Money">&nbsp;&nbsp;Mobile Money</option>
                                    <option value="Pay Code">&nbsp;&nbsp;Paycode</option>
                                    <option value="Cash">&nbsp;&nbsp;Cash</option>
                            </select>
                        @error('mode_of_payment') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label class="form-label">Payment Code</label>
                        <input type="text" class="form-control" wire:model="payment_code" placeholder="">
                        @error('payment_code') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Term</label>
                        <select class="custom-select" wire:model="term">
                                    <option value="1">&nbsp;&nbsp;Term 1</option>
                                    <option value="2">&nbsp;&nbsp;Term 2</option>
                                    <option value="3">&nbsp;&nbsp;Term 2</option>
                            </select>
                        @error('term') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label">Date of Payment</label>
                        <input type="date" class="form-control" wire:model="date_of_payment" placeholder="">
                        @error('date_of_payment') <span class="text-danger">{{ $message }}</span> @enderror
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
