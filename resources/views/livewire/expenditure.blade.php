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
                <th scope="col" wire:click="sortBy('expenditures.id')" style="cursor: pointer;">#
                    @include('partials._sort-icon',['field'=>'expenditures.id'])
                </th>
                <th scope="col" wire:click="sortBy('item')" style="cursor: pointer;"> Item
                    @include('partials._sort-icon',['field'=>'item'])
                </th>
                <th scope="col" wire:click="sortBy('quantity')" style="cursor: pointer;"> Quantity
                    @include('partials._sort-icon',['field'=>'quantity'])
                </th>
                <th scope="col" wire:click="sortBy('unit_price')" style="cursor: pointer;"> Unit Price
                    @include('partials._sort-icon',['field'=>'unit_price'])
                </th>
                <th scope="col" wire:click="sortBy('amount')" style="cursor: pointer;"> Amount
                    @include('partials._sort-icon',['field'=>'amount'])
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
                <td>{{ number_format($expenses->unit_price)}}</td>
                <td>{{ number_format($expenses->amount)}}</td>
                <td>{{$expenses->signed_by}}</td>
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
