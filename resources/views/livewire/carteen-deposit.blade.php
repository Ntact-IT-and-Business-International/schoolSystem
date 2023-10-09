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
                    <th scope="col" wire:click="sortBy('carteen_deposits.id')" style="cursor: pointer;">#
                        @include('partials._sort-icon',['field'=>'carteen_deposits.id'])
                    </th>
                    <th scope="col" wire:click="sortBy('last_name')" style="cursor: pointer;"> Student
                        @include('partials._sort-icon',['field'=>'last_name'])
                    </th>
                    <th scope="col" wire:click="sortBy('amount_deposited')" style="cursor: pointer;"> Amount Deposited
                        @include('partials._sort-icon',['field'=>'amount_deposited'])
                    </th>
                    <th scope="col" wire:click="sortBy('term')" style="cursor: pointer;"> Term
                        @include('partials._sort-icon',['field'=>'term'])
                    </th>
                    <th scope="col" wire:click="sortBy('date_of_deposit')" style="cursor: pointer;"> Date
                        @include('partials._sort-icon',['field'=>'date_of_deposit'])
                    </th>
                    <th scope="col" wire:click="sortBy('date_of_deposit')" style="cursor: pointer;">Current Balance
                        @include('partials._sort-icon',['field'=>'date_of_deposit'])
                    </th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
            @foreach($cash_deposits as $i=>$deposit)
                <tr>
                @php
                    $quantity =\Modules\Carteen\Entities\Carteen::whereStudentId($deposit->student_id)->whereTerm($deposit->term)->value('number');
                    $price =\Modules\Carteen\Entities\Carteen::whereStudentId($deposit->student_id)->whereTerm($deposit->term)->value('price')
                @endphp
                    <th scope="row">{{$cash_deposits->firstitem() + $i}}</th>
                    <td>{{$deposit->last_name}} {{$deposit->first_name}} {{$deposit->other_names}}</td>
                    <td>{{ number_format($deposit->amount_deposited)}}</td>
                    <td>{{$deposit->term}}</td>
                    <td>{{$deposit->date_of_deposit}}</td>
                    <td>{{number_format($deposit->amount_deposited-($quantity * $price))}}</td>
                    <td>
                        <div class="btn-group" id="hover-dropdown-demo">
                            <button type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown" data-trigger="hover">Select</button>
                            <div class="dropdown-menu">
                                <a href="#!" class="btn btn-secondary btn-sm dropdown-item mb-1">Edit</a>
                                <a href="#!" class="btn btn-danger btn-sm dropdown-item mb-1">Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-sm-6 mb-2">
            Showing {{$cash_deposits->firstItem()}} to {{$cash_deposits->lastItem()}} out of {{$cash_deposits->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$cash_deposits->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-carteen-deposit')"><i class="feather icon-plus"></i> Add Cash Deposit (s)</button>
        </div>
    </div>
</div>
