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
                    <th scope="col" wire:click="sortBy('nurse_requests.id')" style="cursor: pointer;">#
                        @include('partials._sort-icon',['field'=>'nurse_requests.id'])
                    </th>
                    <th scope="col" wire:click="sortBy('medicine_name')" style="cursor: pointer;"> Mediicine
                        @include('partials._sort-icon',['field'=>'medicine_name'])
                    </th>
                    <th scope="col" wire:click="sortBy('quantity')" style="cursor: pointer;"> Quantity
                        @include('partials._sort-icon',['field'=>'quantity'])
                    </th>
                    <th scope="col" wire:click="sortBy('amount')" style="cursor: pointer;"> Amount
                        @include('partials._sort-icon',['field'=>'amount'])
                    </th>
                    <th scope="col" wire:click="sortBy('category')" style="cursor: pointer;"> Category
                        @include('partials._sort-icon',['field'=>'category'])
                    </th>
                    <th scope="col" wire:click="sortBy('type')" style="cursor: pointer;"> Type
                        @include('partials._sort-icon',['field'=>'type'])
                    </th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
            @foreach($nurse_requests as $i=>$service) 
                <tr>
                    <th scope="row">{{$nurse_requests->firstitem() + $i}}</th>
                    <td>{{$service->medicine_name}}</td>
                    <td>{{$service->quantity}}</td>
                    <td>{{ number_format($service->amount)}}</td>
                    <td>{{$service->category}}</td>
                    <td>{{$service->type}}</td>
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
            Showing {{$nurse_requests->firstItem()}} to {{$nurse_requests->lastItem()}} out of {{$nurse_requests->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$nurse_requests->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
        <button class="btn btn-info btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'add-sickbay-items')"><i class="feather icon-plus"></i> Add Sickbay Items (s)</button>

            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'make-sickbay-request')"><i class="feather icon-plus"></i> Add Sickbay Request (s)</button>
        </div>
    </div>
</div>
