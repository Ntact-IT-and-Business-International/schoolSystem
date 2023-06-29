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
                <th scope="col" wire:click="sortBy('fees.id')" style="cursor: pointer;">#
                    @include('partials._sort-icon',['field'=>'fees.id'])
                </th>
                <th scope="col" wire:click="sortBy('last_name')" style="cursor: pointer;"> Name
                    @include('partials._sort-icon',['field'=>'last_name'])
                </th>
                <th scope="col" wire:click="sortBy('level')" style="cursor: pointer;"> Class
                    @include('partials._sort-icon',['field'=>'level'])
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
                <td>{{ number_format($fee->amount_paid)}}</td>
                <td>{{ number_format($fee->balance)}}</td>
                <td>{{$fee->mode_of_payment}}</td>
                <td>{{$fee->payment_code}}</td>
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
