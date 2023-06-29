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
                <th scope="col" wire:click="sortBy('dos_offices.id')" style="cursor: pointer;">#
                    @include('partials._sort-icon',['field'=>'dos_offices.id'])
                </th>
                <th scope="col" wire:click="sortBy('first_name')" style="cursor: pointer;"> Name
                    @include('partials._sort-icon',['field'=>'first_name'])
                </th>
                <th scope="col" wire:click="sortBy('item_name')" style="cursor: pointer;"> Item
                    @include('partials._sort-icon',['field'=>'item_name'])
                </th>
                <th scope="col" wire:click="sortBy('term')" style="cursor: pointer;"> Term
                    @include('partials._sort-icon',['field'=>'term'])
                </th>
                <th scope="col" wire:click="sortBy('quantity')" style="cursor: pointer;"> Quantity
                    @include('partials._sort-icon',['field'=>'quantity'])
                </th>
                <th scope="col" wire:click="sortBy('date')" style="cursor: pointer;"> Date
                    @include('partials._sort-icon',['field'=>'date'])
                </th>
                <th>Option</th>
            </tr>
        </thead>
        <tbody>
        @foreach($doss as $i=>$dos)
            <tr>
                <th scope="row">{{$doss->firstitem() + $i}}</th>
                <td>{{$dos->staff_last_name}} {{$dos->staff_first_name}} {{$dos->staff_other_names}}</td>
                <td>{{$dos->item_name}}</td>
                <td>{{ $dos->term}}</td>
                <td>{{$dos->quantity}} {{ $dos->units}}</td>
                <td>{{$dos->date}}</td>
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
            Showing {{$doss->firstItem()}} to {{$doss->lastItem()}} out of {{$doss->total()}} items
        </div>
        <div class="text-right col-sm-6 mb-2">
            {{$doss->links()}}
        </div>
    </div>
    <div class="row align-items-center m-l-0">
        <div class="col-sm-6">
        </div>
        <div class="col-sm-6 text-right">
            <button class="btn btn-success btn-sm mb-3 btn-square" onclick="Livewire.emit('openModal', 'dos-office-records')"><i class="feather icon-plus"></i> Add Record (s)</button>
        </div>
    </div>
</div>
