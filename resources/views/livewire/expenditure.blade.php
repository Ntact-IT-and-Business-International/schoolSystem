<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="row">
            <!-- Staustic card 3 Start -->
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
                <div class="progress bg-white">
                    <div class="progress-bar bg-info" style="width:56%"></div>
                </div>
                <div class="card-body">
                    <div class="text-center"> 
                        <span class="d-block text-primary display-3">{{number_format($this->getExpenditureToday())}}</span>
                        <p class="mb-0">Shillings</p>
                    </div>
                </div>
                <div class="card-footer bg-info bg-pattern-2">
                    <h6 class="text-white mb-0">Today Expenditure</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
                <div class="progress bg-white">
                    <div class="progress-bar bg-success" style="width:14%"></div>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <span class="d-block text-success display-3">{{number_format($this->getExpenditureThisWeek())}}</span>
                        <p class="mb-0">Shillings</p>
                    </div>
                </div>
                <div class="card-footer bg-success bg-pattern-2">
                    <h6 class="text-white mb-0">This Week Expenditure</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
                <div class="progress bg-white">
                    <div class="progress-bar bg-danger" style="width:85%"></div>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <span class="d-block text-danger display-3">{{ number_format($this->getExpenditureThisMonth())}}</span>
                        <p class="mb-0">Shillings</p>
                    </div>
                </div>
                <div class="card-footer bg-danger  bg-pattern-2">
                    <h6 class="text-white mb-0">This Month Expenditure</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4">
                <div class="progress bg-white">
                    <div class="progress-bar bg-warning" style="width:42%"></div>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <p class="mb-0 font-weight-bold">Term 1:<span style="color:blue;">Ugx:&nbsp;{{ number_format($this->getExpenditureThisTerm() + $this->getSalaryThisTerm())}}</span></p>
                        <p class="mb-0 font-weight-bold">Term 2:<span style="color:blue;">Ugx:&nbsp;{{ number_format($this->getExpenditureTerm2() + $this->getSalarySecondTerm())}}</span></p>
                        <p class="mb-0 font-weight-bold">Term 3:<span style="color:blue;">Ugx:&nbsp;{{ number_format($this->getExpenditureTerm3() + $this->getSalaryThirdTerm())}}</span></p>
                        <h6>Shillings</h6>
                        
                    </div>
                </div>
                <div class="card-footer bg-warning  bg-pattern-2">
                    <h6 class="text-white mb-0">This Year: Ugx:&nbsp;{{ number_format($this->getExpenditureThisYear())}}</h6>
                </div>
            </div>
        </div>
        <!-- Staustic card 9 end -->
    </div>
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
                <th scope="col" wire:click="sortBy('expenditures.id')" style="cursor: pointer;">#
                    @include('partials._sort-icon',['field'=>'expenditures.id'])
                </th>
                <th scope="col" wire:click="sortBy('item')" style="cursor: pointer;"> Item
                    @include('partials._sort-icon',['field'=>'item'])
                </th>
                <th scope="col" wire:click="sortBy('quantity')" style="cursor: pointer;"> Quantity
                    @include('partials._sort-icon',['field'=>'quantity'])
                </th>
                <th scope="col" wire:click="sortBy('category')" style="cursor: pointer;"> Category
                    @include('partials._sort-icon',['field'=>'category'])
                </th>
                <th scope="col" wire:click="sortBy('unit_price')" style="cursor: pointer;"> Unit Price
                    @include('partials._sort-icon',['field'=>'unit_price'])
                </th>
                <th scope="col" wire:click="sortBy('amount')" style="cursor: pointer;"> Amount
                    @include('partials._sort-icon',['field'=>'amount'])
                </th>
                <th scope="col" wire:click="sortBy('term')" style="cursor: pointer;"> Term
                    @include('partials._sort-icon',['field'=>'term'])
                </th>
                <th scope="col" wire:click="sortBy('signed_by')" style="cursor: pointer;"> Signed By
                    @include('partials._sort-icon',['field'=>'signed_by'])
                </th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        @foreach($expenditures as $i=>$expenses)
            <tr>
                <th scope="row">{{$expenditures->firstitem() + $i}}</th>
                <td>{{$expenses->item}}</td>
                <td>{{$expenses->quantity}}</td>
                <td>{{$expenses->category}}</td>
                <td>{{ number_format($expenses->unit_price)}}</td>
                <td>{{ number_format($expenses->amount)}}</td>
                <td>{{ $expenses->term}}</td>
                <td>{{$expenses->signed_by}}</td>
                <td>
                    <div class="btn-group" id="hover-dropdown-demo">
                        <button type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown" data-trigger="hover">Select</button>
                        <div class="dropdown-menu"> 
                            <a href="{{URL::signedRoute('EditExpenditure', ['expenditure_id' => $expenses->id])}}" class="btn btn-info btn-sm dropdown-item mb-1">Edit</a>
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
            Showing {{$expenditures->firstItem()}} to {{$expenditures->lastItem()}} out of {{$expenditures->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$expenditures->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-expenditure')"><i class="feather icon-plus"></i> Add Expenditure (s)</button>
        </div>
    </div>
</div>
