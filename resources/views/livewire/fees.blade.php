<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="row">
        <!-- Staustic card 1 Start -->
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4 bg-primary">
                <div class="card-body text-white">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-white">{{ number_format($this->getFeesToday())}}</h4>
                            <h6 class="text-white mb-0">Shillings</h6>
                        </div>
                        <div class="col-4 text-right">
                            <i class="ion ion-md-ribbon display-4"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer pb-0 bg-white">
                    <div class="p-3 mt-n3 rounded bg-white ui-bottom-data">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <p class="mb-0"> Todays Collection</p>
                            </div>
                            <div class="col-3 text-right">
                                <i class="ion ion-md-trending-up text-success f-16"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4 bg-success">
                <div class="card-body text-white">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-white">{{ number_format($this->getFeesThisWeek())}}</h4>
                            <h6 class="text-white mb-0">Shillings</h6>
                        </div>
                        <div class="col-4 text-right">
                            <i class="ion ion-md-paper display-4"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer pb-0 bg-white">
                    <div class="p-3 mt-n3 rounded bg-white ui-bottom-data">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <p class="mb-0"> This Weeks Collection</p>
                            </div>
                            <div class="col-3 text-right">
                                <i class="ion ion-md-trending-up text-success f-16"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4 bg-danger">
                <div class="card-body text-white">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h4 class="text-white">{{ number_format($this->getFeesThisMonth())}}</h4>
                            <h6 class="text-white mb-0">Shillings</h6>
                        </div>
                        <div class="col-4 text-right">
                            <i class="ion ion-ios-calendar display-4"></i>
                        </div>
                    </div>
                </div>
                <div class="card-footer pb-0 bg-white">
                    <div class="p-3 mt-n3 rounded bg-white ui-bottom-data">
                        <div class="row align-items-center">
                            <div class="col-9">
                                <p class="mb-0">This Month Collections</p>
                            </div>
                            <div class="col-3 text-right">
                                <i class="ion ion-md-trending-down text-danger f-16"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mb-4 bg-info">
                <div class="card-body text-white">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h4 class="text-white font-weight-bold">Term 1:&nbsp; Ugx-{{number_format($this->getFeesTerm1())}}<br> Term 2:&nbsp; Ugx-{{number_format($this->getFeesTerm2())}} <br> Term 3: &nbsp; Ugx-{{number_format($this->getFeesTerm3())}}</h4>
                        </div>
                    </div>
                </div>
                <div class="card-footer pb-0 bg-white">
                    <div class="p-3 mt-n3 rounded bg-white ui-bottom-data">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <p class="mb-0">This Year: Ugx: {{number_format($this->getFeesThisYear())}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Staustic card 1 end -->
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
                <th scope="col" wire:click="sortBy('fees.id')" style="cursor: pointer;">#
                    @include('partials._sort-icon',['field'=>'fees.id'])
                </th>
                <th scope="col" wire:click="sortBy('last_name')" style="cursor: pointer;"> Name
                    @include('partials._sort-icon',['field'=>'last_name'])
                </th>
                <th scope="col" wire:click="sortBy('level')" style="cursor: pointer;"> Class
                    @include('partials._sort-icon',['field'=>'level'])
                </th>
                <th scope="col" wire:click="sortBy('term')" style="cursor: pointer;"> Term
                    @include('partials._sort-icon',['field'=>'term'])
                </th>
                <th scope="col" wire:click="sortBy('amount_paid')" style="cursor: pointer;"> Amount Paid
                    @include('partials._sort-icon',['field'=>'amount_paid'])
                </th>
                <th scope="col" wire:click="sortBy('balance')" style="cursor: pointer;"> Balance
                    @include('partials._sort-icon',['field'=>'balance'])
                </th>
                <th scope="col" wire:click="sortBy('mode_of_payment')" style="cursor: pointer;"> Mode Of Payment
                    @include('partials._sort-icon',['field'=>'mode_of_payment'])
                </th>
                <th scope="col" wire:click="sortBy('payment_code')" style="cursor: pointer;"> Payment Code
                    @include('partials._sort-icon',['field'=>'payment_code'])
                </th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        @foreach($fees as $i=>$fee)
            <tr>
                <th scope="row">{{$fees->firstitem() + $i}}</th>
                <td>{{$fee->last_name}} {{$fee->first_name}} {{$fee->other_names}}</td>
                <td>{{$fee->level}}</td>
                <td>{{$fee->term}}</td>
                <td>{{ number_format($fee->amount_paid)}}</td>
                <td>{{ number_format($fee->balance)}}</td>
                <td>{{$fee->mode_of_payment}}</td>
                <td>{{$fee->payment_code}}</td>
                <td>
                    <div class="btn-group" id="hover-dropdown-demo">
                        <button type="button" class="btn btn-info dropdown-toggle btn-sm" data-toggle="dropdown" data-trigger="hover">Select</button>
                        <div class="dropdown-menu">
                            <a href="/fees/generate-receipt/{{$fee->id}}" class="btn btn-success btn-sm dropdown-item mb-1">Print Receipt</a>
                            <a href="/fees/clear-payments/{{$fee->id}}" class="btn btn-warning btn-sm dropdown-item mb-1">Clear Payments</a>
                            <a href="#!" class="btn btn-info btn-sm dropdown-item mb-1">Edit</a>
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
            Showing {{$fees->firstItem()}} to {{$fees->lastItem()}} out of {{$fees->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$fees->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-fees')"><i class="feather icon-plus"></i> Add Fee (s)</button>
        </div>
    </div>
</div>
<script src="{{ asset('Admin/assets/js/pages/ui_dropdowns.js')}}"></script>
