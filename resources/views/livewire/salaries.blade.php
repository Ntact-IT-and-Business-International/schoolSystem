<div>
    {{-- Success is as dangerous as failure. --}}
</div>
<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="card-header with-elements">
        <h6 class="card-header-title mb-0">
                <div class="form-group col-sm-6">
                    <select class="custom-select col-sm-6" wire:model='perPage'>
                        <option>10</option>
                        <option>20</option>
                        <option>30</option>
                        <option>40</option>
                        <option>50</option>
                        <option>60</option>
                    </select>
                </div>
        </h6>
        <div class="card-header-elements ml-auto">
            <div class="form-group row">
                <div class="col-sm-8">
                    <input wire:model.debounce.300ms="search" class="form-control" type="text" placeholder="Search" aria-label="Search">
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col" wire:click="sortBy('salaries.id')" style="cursor: pointer;">#
                    @include('partials._sort-icon',['field'=>'salaries.id'])
                </th>
                <th scope="col" wire:click="sortBy('staff_last_name')" style="cursor: pointer;"> Name
                    @include('partials._sort-icon',['field'=>'staff_last_name'])
                </th>
                <th scope="col" wire:click="sortBy('quantity')" style="cursor: pointer;"> Quantity
                    @include('partials._sort-icon',['field'=>'quantity'])
                </th>
                <th scope="col" wire:click="sortBy('actual_salary')" style="cursor: pointer;"> Actual Salary
                    @include('partials._sort-icon',['field'=>'actual_salary'])
                </th>
                <th scope="col" wire:click="sortBy('amount')" style="cursor: pointer;"> Amount Paid
                    @include('partials._sort-icon',['field'=>'amount'])
                </th>
                <th scope="col" wire:click="sortBy('balance')" style="cursor: pointer;"> Balance
                    @include('partials._sort-icon',['field'=>'balance'])
                </th>
                <th scope="col" wire:click="sortBy('paid_on_date')" style="cursor: pointer;"> Payment Date
                    @include('partials._sort-icon',['field'=>'paid_on_date'])
                </th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        @foreach($salaries as $i=>$salary)
            <tr>
                <th scope="row">{{$salaries->firstitem() + $i}}</th>
                <td>{{$salary->staff_last_name}} {{$salary->staff_first_name}} {{$salary->staff_other_names}}</td>
                <td>{{$salary->quantity}}</td>
                <td>{{ number_format($salary->actual_salary)}}</td>
                <td>{{ number_format($salary->amount)}}</td>
                <td>{{ number_format($salary->actual_salary-$salary->amount)}}</td>
                <td>{{$salary->paid_on_date}}</td>
                <td>
                    <a href="#!" class="btn btn-info btn-sm">Edit</a>
                    <a href="#!" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$salaries->firstItem()}} to {{$salaries->lastItem()}} out of {{$salaries->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$salaries->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-salary')"><i class="feather icon-plus"></i> Add Fee (s)</button>
        </div>
    </div>
</div>
